<?php

namespace App\Models;

use App\Models\Location;
use App\Models\Country;
use App\Models\HomeCourse;
use DB;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'universities';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['city'];

    protected $guarded = [];

    /**
     * Gets mobilities of the university.
     */
    public function mobilities()
    {
        return $this->hasMany(Mobility::class);
    }

    /**
     * Gets courses of the university.
     */
    public function foreignCourses()
    {
        return $this->hasMany(ForeignCourse::class);
    }

    /**
     * Gets university of the mobility.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Finds an university profile in a database or create a new one.
     *
     * @param  Array  $data  validated request data
     * @return  University
     */
    public static function getUniversity($data)
    {
        if (!array_key_exists('uniID', $data)) {
            return self::createNewUniProfile(
                $data['name'],
                $data['originalName'],
                City::getCity($data['city'], $data['country'], $data['continent']),
                $data['web'],
                $data['xchange'],
                $data['expiration']
            );
        }
        else {
            return self::find($data['uniID']);
        }
    }

    /**
     * Stores data about university into the database.
     *
     * @param   String  $name   University name in English
     * @param   String  $originalName   Original university name
     * @param   City    $location   University Location instance from datatabase
     * @param   String  $web    URL of university's web page
     * @param   String  $xchange    URL of university's progile on xchange portal
     * @param   String  $expiration Date of contract expiration
     * @return  University
     */
    public static function createProfile($englishName, $originalName, $nativeName, $xchange, $web, $city)
    {
        $uni = new University;
            $uni->name = $englishName;
            $uni->original_name = $originalName;
            $uni->native_name = $nativeName;
            $uni->web = $web;
            $uni->xchange = $xchange;
            $uni->city()->associate($city);
        $uni->save();
        return $uni;
    }

    public static function updateProfile($uniID, $data)
    {
        $uni = University::find($uniID);
            $uni->name = $data['name'];
            $uni->native_name = $data['native_name'];
            $uni->web = $data['web'];
            $uni->xchange = $data['xchange'];
            $uni->associateCity($data);
        $uni->save();
    }
    public static function getForeignCourses($id)
    {
        return ForeignCourse::where('university_id', '=', $id)->get();
    }

    public static function getMobilities($id)
    {
        return Mobility::where('university_id', '=', $id)->get();
    }

    public static function connectProfiles($connect, $connectTo)
    {
        foreach (University::getForeignCourses($connect) as $course) {
            $course->changeUniversity($connectTo);
        }
        foreach (University::getMobilities($connect) as $mobility) {
            $mobility->changeUniversity($connectTo);
        }
        University::destroy($connect);
    }
    public function associateCity($data)
    {
        $this->city()->associate(City::add($data['city'], $data['country']));
    }

    public static function get($name, $city)
    {
        $uni = self::firstOrCreate([
            'original_name' => $name
        ]);
        if(!$uni->city()) {
            $uni->city()->associate(City::getCity($city));
        }
        return $uni;
    }

    public static function getAll()
    {
        $unis = self::all();
        // foreach($unis as $uni) {
        //     $uni->getXchange();
        // }
        return $unis;
    }

    private function getXchange()
    {
        $this->xchangeLink = 'https://xchange.utb.cz/instituce/' . $this->xchange . '-' .
            DB::connection('xchange')->table('institutions')->select('url')->where('id', $this->xchange)->first();
        $this->rating = DB::connection('xchange')->table('reviews')->where('institution_id',$this->xchange)->avg();
    }

    public static function getCount()
    {
        return self::all()->count();
    }

    public static function getFavorites()
    {
        $all = self::getAll();
        $top3 = [];
        foreach($all as $i => $uni)
        {
            if ($i < 3) {
                $top3[] = $uni;
            }
            else {
                return $top3;
            }
        }
    }

    public static function getById($id)
    {
        return University::find($id);
    }

    public static function findResults()
    {
        $select =  DB::table('universities')
            ->join('cities', function($join) {
                $join->on('universities.city_id', '=', 'cities.id')
                     ->when($request = Country::getSession(), function($query, $request) {
                           return $query->whereIn('cities.country_id', $request);
                       });
            })
            ->join('mobilities', function($join2) {
                $join2->on('mobilities.university_id', '=', 'universities.id')
                      ->join('pairings', function($join3) {
                            $join3->on('mobilities.id', '=', 'pairings.mobility_id')
                                  ->join('foreign_courses', 'foreign_courses.id', '=', 'pairings.foreign_course_id')
                                  ->join('home_courses', function ($join4) {
                                        $join4->on('home_courses.id', '=', 'pairings.home_course_id')
                                              ->when($request = HomeCourse::getSession(), function($query, $request) {
                                                    return $query->whereIn('home_courses.code', $request['codes'])
                                                                 ->orWhereIn('home_courses.group', $request['groups']);
                                                });
                                    });
                        });
                })
            ->select(DB::raw('universities.id as universityID, ' .
                        'universities.name as universityName, ' .
                        'universities.native_name as universityNativeName, ' .
                        'cities.name as cityName, ' .
                        'cities.country_id as countryID, ' .
                        'pairings.reason_id as reasonID, ' .
                        'foreign_courses.id as foreignCourseID, ' .
                        'foreign_courses.name as foreignCourseName, ' .
                        '(SELECT count(*) FROM mobilities ' .
                        'WHERE mobilities.university_id = universities.id) ' .
                        'as count'))
            ->orderBy('count', 'desc')
            ->get();
        $result = [];
        foreach ($select->all() as $row) {
            if (array_key_exists($row->universityID, $result) && (count($result[$row->universityID]['courses']) < 5)) {
                if (empty($row->reasonID)) {
                    $result[$row->universityID]['courses'][$row->foreignCourseID] = [
                        'name' => $row->foreignCourseName,
                        'reason' => $row->reasonID
                    ];
                }
            }
            else {
                $result[$row->universityID] = [
                    'name' => $row->universityName,
                    'native' => $row->universityNativeName,
                    'city' => $row->cityName,
                    'countryID' => $row->countryID,
                    'count' => $row->count,
                    'courses' => empty($row->reasonID) ? array(
                        $row->foreignCourseID => [
                            'name' => $row->foreignCourseName,
                            'reason' => $row->reasonID
                        ]
                    ) : []
                ];
            }
        }
        return $result;
    }
}
