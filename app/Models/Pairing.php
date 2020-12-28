<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeCourse;
use App\Models\ForeignCourse;

class Pairing extends Model
{
    use HasFactory;

    protected $table = 'pairings';

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
    protected $with = ['homeCourse','foreignCourse'];
    /**
     * Gets home course of the pairing.
     */
    public function homeCourse()
    {
        return $this->belongsTo(HomeCourse::class);
    }

    /**
     * Gets foreign course of the pairing.
     */
    public function foreignCourse()
    {
        return $this->belongsTo(ForeignCourse::class);
    }

    /**
     * Gets mobility of the pairing.
     */
    public function mobility()
    {
        return $this->belongsTo(Mobility::class);
    }
    
    /**
     * Saves mobility pairings in the database.
     * 
     * @param   Mobility    $mobility   Mobility instance
     * @param   Array   $semester   Validated Array of Date years of the mobility
     * @param   Array   $pairings   Validated Array of the mobility's courses 
     */
    public static function SavePairings($mobility, $semester, $pairings)
    {
        foreach ($semester as $sem => $year) 
        {
            if ($pairings[$sem] == null || count($pairings[$sem])==0)
            {
                // error
                return;
            }
            foreach ($pairings[$sem] as $pairing) 
            {
                $pair = new Pairing;
                    $pair->isSummer = $sem === 'summer';
                    $pair->year = $year;
                    $pair->foreignCourse()->associate(self::GetCourse($mobility->university, $pairing['foreignCode'], $pairing['foreignName']));
                    $pair->homeCourse()->associate(self::GetCourse(null, $pairing['homeCode'], $pairing['homeName']));
                    $pair->mobility()->associate($mobility);
                $pair->save();
            }
        }
    }

        /**
     * Finds or creates course in the database.
     * 
     * @param   University  $university Instance of foreign course university, or null if it is a home course
     * @param   String  $code   Course identification code
     * @param   String  $name   Course name
     * @return  mix ForeignCourse if university is set, else HomeCourse
     */
    private static function GetCourse($university, $code, $name)
    {
        if ($university != null)
        {
            return ForeignCourse::firstOrCreate(
                    [
                        'code' => $code,
                        'name' => $name,
                        'university_id' => $university->id
                    ]);
        }
        else
        {
            return HomeCourse::firstOrCreate(
                    [
                        'notSoUniqueId' => 0,
                        'code' => $code,
                        'name' => $name
                    ]);
        }
    }
}
