<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ImportColumns;
use DB;



class Mobility extends Model
{

    const SPRING_SEMESTER = "summer";
    const AUTUMN_SEMESTER = "winter";
    

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
     * Gets university of the mobility.
     */
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    /**
     * Gets pairings of the mobility.
     */
    public function pairings()
    {
        return $this->hasMany(Pairing::class);
    }


    // public static function saveMobility($data)
    // {
    //     $mobility = new Mobility;
    //         $mobility->student = "test";    // change when connected to system
    //         $mobility->university()
    //                  ->associate(University::getUniversity($data));
    //     $mobility->save();
    //     Pairing::saveMobilityPairings(
    //         $mobility, 
    //         $data['semester'], 
    //         $data['pairing']
    //     );
    // }

    public function getDuration($id)
    {
        $courseTimes = Pairing::getSemestersOfMobility($id);
        $duration = $this->getSemester($courseTimes[0]);
        if (count($courseTimes) > 1) {
            $duration .= '–⁠' . $this->getSemester($courseTimes[count($courseTimes) - 1]);
        }
        return $duration;
    }

    private function getSemester($courseTime)
    {
        return $this->getTypeOfSemester($courseTime->is_summer) . ' ' . $courseTime->year;
    }

    private function getTypeOfSemester($type)
    {
        return $type ? $this->SPRING_SEMESTER : $this->AUTUMN_SEMESTER;
    }

    public function updateMobility($data)
    {
        $this->saveRatings($data->rate);
        $this->unlinkCourses($data->unlinked, $data->new);
        $this->save();
    }

    public function saveRatings($ratings)
    {
        foreach ($ratings as $pairID => $rating) {
            $pair = $this->pairings->where('id', $pairID)->get();
            if ($pair != null) {
                $pair->saveRating($rating);
            }
        }
    }

    public function unlinkCourses($unlinkedData, $new)
    {
        foreach($unlinkedData as $pairID => $unlinked) {
            $pair = $this->pairings
                         ->where('id', $pairID)
                         ->get();
            if (($unlinked == 1) && (array_key_exists($pairID, $new))) {
                $pair->unlink_reason()
                     ->associate(UnlinkReason::createNewReason($new));
            }
            else {
                $pair->unlink_reason()
                     ->associate($unlinked);
            }
            $pair->save();
        }
    }

    public static function getMobility($data) 
    {
        $end = empty($data[ImportColumns::END]) ? null : $data[ImportColumns::END];
        $mobility = self::firstOrCreate([
            'student' => self::getStudent($data[ImportColumns::STUDENT_ID]),
            'arrival' => $data[ImportColumns::START],
            'departure' => $end,
            'is_summer' => self::isSummerSemester($data[ImportColumns::SEMESTER]),
            'year' => self::getYear($data)
        ]);
        if (!$mobility->university()) {
            $mobility->university()->associate(University::getUniversityByName([ImportColumns::UNIVERSITY]));
        }
        return $mobility;
    }

    public static function getYear($data) 
    {
        if ($data[ImportColumns::SEMESTER] === "ZS") {
            return $data[ImportColumns::YEAR];
        }
        else {
            return $data[ImportColumns::YEAR] + 1;
        }
    }

    public static function isSummerSemester($semester) 
    {
        return $semester === "LS";
    }

    public static function import($transaction)
    {
        if ($transaction) {
            foreach ($transaction as $mobility) {
                self::createNew($mobility);
            }
        }
    }
    private static function createNew($mobility)
    {
        $toSave = new Mobility;
            $toSave->student = $mobility->student->data;
            $toSave->arrival = $mobility->arrival->data;
            if (!empty($mobility->departure->data)) {
                $toSave->departure = $mobility->departure->data;
            }
            $toSave->year = $mobility->year->data;
            $toSave->is_summer = self::isSummerSemester($mobility->semester->data);
            $toSave->university()->associate(University::get(
                $mobility->university->data, 
                $mobility->city
            ));
        $toSave->save();
        Pairing::import($toSave, $mobility->pairings, $toSave->university->id);
    }

    public static function getCount()
    {
        return self::all()->count();
    }

    public static function findById($id)
    {
        $mobility = Mobility::find($id);
        if ($mobility) {
            $mobility->semester = $mobility->getTypeOfSemester($mobility->is_summer);
        }
        return $mobility;
    }

    public function changeUniversity($uniID)
    {
        $this->university()->associate(University::find($uniID));
        $this->save();
    }
}