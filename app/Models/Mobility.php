<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ImportColumns;



class Mobility extends Model
{
    use HasFactory;

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
    public $timestamps = false;

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


    public static function saveMobility($data)
    {
        $mobility = new Mobility;
            $mobility->student = "test";    // change when connected to system
            $mobility->university()
                     ->associate(University::getUniversity($data));
        $mobility->save();
        Pairing::saveMobilityPairings(
            $mobility, 
            $data['semester'], 
            $data['pairing']
        );
    }

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

    public static function import($file)
    {
        foreach ($file['mobility'] as $mobility) {
            $toSave = new Mobility;
            $toSave->student = $mobility['student'];
            $toSave->arrival = $mobility['arrival'];
            $toSave->departure = $mobility['departure'];
            $toSave->year = $mobility['year'];
            $toSave->is_summer = self::isSummerSemester($mobility['semester']);
            $toSave->university()->associate(University::get($mobility['university'], $mobility['city']));
            $toSave->save();
            foreach ($mobility['pairing'] as $pairing) {
                Pairing::import($toSave, $pairing, $toSave->university->id);
            }
        }
    }

}