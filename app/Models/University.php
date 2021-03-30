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

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get mobilities of the university.
     */
    public function mobilities()
    {
        return $this->hasMany(Mobility::class);
    }

    /**
     * Get courses of the university.
     */
    public function foreignCourses()
    {
        return $this->hasMany(ForeignCourse::class);
    }

    /**
     * Get university of the mobility.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Store data about university into the database.
     *
     * @param string  $englishName  
     * @param string  $originalName
     * @param string  $nativeName
     * @param string  $xchange
     * @param string  $web   
     * @param City  $city
     * @return University
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

    /**
     * Update data in the database.
     * 
     * @param int  $uniID
     * @param array  $data
     */
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

    /**
     * Return foreign courses assigned to the university.
     * 
     * @param int  $id
     * @return Illuminate\Support\Collection
     */
    public static function getForeignCourses($id)
    {
        return ForeignCourse::where('university_id', '=', $id)->get();
    }

    /**
     * Return mobilities assigned to the university.
     * 
     * @param int  $id
     * @return Illuminate\Support\Collection
     */
    public static function getMobilities($id)
    {
        return Mobility::where('university_id', '=', $id)->get();
    }

    /**
     * Merge universities.
     * 
     * @param int  $connect
     * @param int  $connectTo
     */
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

    /**
     * Associate city with the university.
     * 
     * @param array  $data
     */
    public function associateCity($data)
    {
        $this->city()->associate(City::add($data['city'], $data['country']));
    }

    /**
     * Return university by it's original name.
     * 
     * @param string  $name
     * @param City  $city
     * @return University
     */
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

    /**
     * Return list of all universities.
     * 
     * @return Illuminate\Support\Collection
     */
    public static function getAll()
    {
        return self::all();
    }

    /**
     * Return number of all stored universities.
     * 
     * @return int
     */
    public static function getCount()
    {
        return self::all()->count();
    }

    /**
     * Return university instance.
     * 
     * @param int  $id
     * @return University|null
     */
    public static function getById($id)
    {
        return University::find($id);
    }

    /**
     * Return list of universities based on search request.
     * 
     * @return array
     */
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
        return self::groupData($select);
    }

    /**
     * Return an array from the query collection.
     * 
     * @param Illuminate\Support\Collection  $select
     * @return array
     */
    private static function groupData($select)
    {
        $result = [];
        foreach ($select->all() as $row) {
            if (array_key_exists($row->universityID, $result)) {
                if ((count($result[$row->universityID]['courses']) < 5) && empty($row->reasonID)) {
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
