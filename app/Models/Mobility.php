<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mobility extends Model
{
    use HasFactory;

    const SPRING_SEMESTER = "léto";
    const AUTUMN_SEMESTER = "zima";
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
            $mobility->university()->associate(University::getUniversity($data));
        $mobility->save();
        Pairing::saveMobilityPairings($mobility, $data['semester'], $data['pairing']);
    }

    public function getDuration($id)
    {
        $courseTimes = Pairing::getSemestersOfMobility($id);
        $duration = $this->getSemester($courseTimes[0]);
        if (count($courseTimes) > 1)
        {
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
        foreach ($ratings as $pairID => $rating) 
        {
            $pair = $this->pairings->where('id', $pairID)->get();
            if ($pair != null)
            {
                $pair->saveRating($rating);
            }
        }
    }

    public function unlinkCourses($unlinkedData, $new)
    {
        foreach($unlinkedData as $pairID => $unlinked)
        {
            $pair = $this->pairings->where('id', $pairID)->get();
            if ($unlinked == 1 && array_key_exists($pairID, $new))
            {
                $pair->unlink_reason()->associate(UnlinkReason::createNewReason($new));
            }
            else
            {
                $pair->unlink_reason()->associate($unlinked);
            }
            $pair->save();
        }
    }
}
