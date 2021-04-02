<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use ImportColumns;



class Mobility extends Model
{
    const SPRING_SEMESTER = "summer";
    const AUTUMN_SEMESTER = "winter";
    const EXPORT_COLUMNS = 'foreign_courses.name as name, ' .
        'foreign_courses.id as foreignCourseID, ' .
        'home_courses.code as homeCode, ' .
        'home_courses.name_cz as homeNameCZ, ' .
        'home_courses.name_en as homeNameEN, ' .
        'pairings.id as pairingID, ' .
        'reasons.description_cz as reason, ' .
        'pairings.rating as rating, ' .
        'mobilities.is_summer as semester, ' .
        'mobilities.year as year';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mobilities';

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
    protected $with = ['university', 'pairings'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_summer' => 'boolean',
    ];

    /**
     * Get university of the mobility.
     */
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    /**
     * Get university of the mobility.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get pairings of the mobility.
     */
    public function pairings()
    {
        return $this->hasMany(Pairing::class);
    }

    /**
     * Update the data in the database.
     * 
     * @param array  $data
     */
    public function updateMobility($data)
    {
        $this->saveRatings($data['rate']);
        $this->unlinkCourses($data['unlinked'], $data['new']);
        $this->save();
    }

    /**
     * Update pairing ratings of the mobility.
     * 
     * @param array  $ratings
     */
    public function saveRatings($ratings)
    {
        foreach ($ratings as $pairID => $rating) {
            $pair = $this->pairings->where('id', $pairID)->get();
            if ($pair != null) {
                $pair->saveRating($rating);
            }
        }
    }

    /**
     * Update pairing ratings of the mobility.
     * 
     * @param array  $unlinkedData
     * @param array  $new
     */
    public function unlinkCourses($unlinkedData, $new)
    {
        foreach($unlinkedData as $pairID => $unlinked) {
            $pair = $this->pairings
                         ->where('id', $pairID)
                         ->get();
            if (($unlinked == 1) && (array_key_exists($pairID, $new))) {
                $pair->unlink_reason()
                     ->associate(Reason::createNewReason($new)); // TODO: update
            }
            else {
                $pair->unlink_reason()
                     ->associate($unlinked);
            }
            $pair->save();
        }
    }

    /**
     * Save the year of the mobility.
     * 
     * @param int  $year
     */
    public function getYear($year)
    {
        if (!$this->is_summer) {
            $this->year = $year;
        }
        else {
            $this->year = $year + 1;
        }
    }

    /**
     * Check if the semester is summer.
     * 
     * @param string  $semester
     * @return bool
     */
    public static function isSummerSemester($semester)
    {
        return $semester === "LS";
    }

    /**
     * Import data to the database.
     * 
     * @param array  $transaction
     */
    public static function import($transaction)
    {
        if ($transaction) {
            foreach ($transaction as $mobility) {
                self::createNew($mobility);
            }
        }
    }

    /**
     * Save new mobility to the database.
     * 
     * @param MobilityValidator  $mobility
     */
    private static function createNew($mobility)
    {
        $toSave = new Mobility;
            $toSave->user()->associate(User::getByUtbID($mobility->student->data));
            $toSave->arrival = $mobility->arrival->data;
            if (!empty($mobility->departure->data)) {
                $toSave->departure = $mobility->departure->data;
            }
            $toSave->is_summer = self::isSummerSemester($mobility->semester->data);
            $toSave->getYear($mobility->year->data);
            $toSave->university()->associate(University::get(
                $mobility->university->data,
                $mobility->city
            ));
        $toSave->save();
        Pairing::import($toSave, $mobility->pairings, $toSave->university->id);
    }

    /**
     * Return the number of rows in the database.
     * 
     * @return int
     */
    public static function getCount()
    {
        return self::all()->count();
    }

    /**
     * Return the mobility instance.
     * 
     * @param int  $id
     * @return Mobility
     */
    public static function findById($id)
    {
        return Mobility::find($id);
    }

    /**
     * Change the university column.
     * 
     * @param int  $uniID
     */
    public function changeUniversity($uniID)
    {
        $this->university()->associate(University::find($uniID));
        $this->save();
    }

    /**
     * Return all mobilities associated with the university.
     * 
     * @param int  $id
     * @return array
     */
    private static function getAllFromUni($id)
    {
        return DB::table('mobilities')
            ->where('mobilities.university_id', '=', $id)
            ->join('pairings', function ($join) {
                $join->on('pairings.mobility_id', '=', 'mobilities.id')
                    ->join('home_courses', 'pairings.home_course_id', '=', 'home_courses.id')
                    ->join('foreign_courses', 'foreign_courses.id', '=', 'pairings.foreign_course_id')
                    ->leftJoin('reasons', 'pairings.reason_id', '=', 'reasons.id');
            })        
            ->select(DB::raw(self::EXPORT_COLUMNS))->get();
    }

    /**
     * Return all mobilities associated with the university
     * that contains selected courses.
     * 
     * @param int  $id
     * @return Illuminate\Support\Collection
     */
    private static function getSelectedFromUni($id)
    {
        $select =  DB::table('mobilities')
        ->join('pairings', function ($join) {
            $join->on('pairings.mobility_id', '=', 'mobilities.id')
            ->join('home_courses', function ($join2) {
                $join2->on('home_courses.id', '=', 'pairings.home_course_id');
            })
            ->join('foreign_courses', 'foreign_courses.id', '=', 'pairings.foreign_course_id')
            ->leftJoin('reasons', 'pairings.reason_id', '=', 'reasons.id');
        })
        ->where('mobilities.university_id', '=', $id)
        ->where(function ($query) {
        $courses = HomeCourse::getSession(session('courses'));

            $query->whereIn('home_courses.group', $courses['groups'])
                ->orWhereIn('home_courses.code', $courses['codes']);
        })->select(DB::raw(self::EXPORT_COLUMNS))->get();
        return $select;
    }

    /**
     * Return mobilities for the university profile.
     * 
     * @param int  $id
     * @return Illuminate\Support\Collection
     */
    public static function getUniversityData($id)
    {
        $courses = HomeCourse::getSession();
        $data = [ 
            'all' => self::groupData(self::getAllFromUni($id)), 
            'searched' => $courses ?  self::groupData(self::getSelectedFromUni($id)): null
        ];
        return $data;
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
            if (array_key_exists($row->foreignCourseID, $result)) {
                    $result[$row->foreignCourseID]['courses'][$row->pairingID] = [
                        'code' => $row->homeCode,
                        'nameCZ' => $row->homeNameCZ,
                        'nameEN' => $row->homeNameEN,
                        'reason' => $row->reason,
                        'semester' => $row->semester,
                        'year' => $row->year,
                        'rating' => $row->rating
                    ];
            }
            else {
                $result[$row->foreignCourseID] = [ 
                    'name' => $row->name,
                    'courses' => [ $row->pairingID => [
                        'code' => $row->homeCode,
                        'nameCZ' => $row->homeNameCZ,
                        'nameEN' => $row->homeNameEN,
                        'reason' => $row->reason,
                        'semester' => $row->semester,
                        'year' => $row->year,
                        'rating' => $row->rating
                    ]]
                ];
            }
            
        }
        return $result;
    } 
}