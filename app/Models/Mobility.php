<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Mobility extends Model
{
    /**
     * Name for spring semester.
     * 
     * @var string
     */
    const SPRING_SEMESTER = "summer";

    /**
     * Name for autumn semester.
     * 
     * @var string
     */
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
        if (array_key_exists('rate',$data)) {
            $this->saveRatings($data['rate']);
        }
        if (array_key_exists('reason', $data)) {
            $this->unlinkCourses(
                $data['reason'], 
                array_key_exists('new', $data) ? $data['new'] : null
            );
        }
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
            $pair = Pairing::find($pairID);
            if ($pair != null && $pair->mobility_id == $this->id) {
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
            $pair = Pairing::find($pairID);
            if (($unlinked == 1) && (array_key_exists($pairID, $new))) {
                $pair->reason()
                     ->associate(Reason::create($new, "", false));
            }
            else {
                $pair->reason_id = $unlinked;
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
        self::deletePrevious($mobility->student->data, $mobility->arrival->data, $mobility->departure->data);
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
     * Delete mobility in the same time as the mobility.
     * 
     * @param string  $user
     * @param string  $from
     * @param string  $to
     */
    private static function deletePrevious($user, $from, $to)
    {
        if ($mobility = User::getPreviousMobility($user, $from, $to)) {
            foreach ($mobility->pairings as $pairing) {
                $pairing->delete();
            }
            $mobility->delete();
        }
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
}