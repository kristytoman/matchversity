<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HomeCourse;
use App\Models\ForeignCourse;
use DB;
use ImportColumns;


class Pairing extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pairings';

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
    protected $with = ['homeCourse', 'foreignCourse'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'reason_id' => null
    ];

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
     * Gets reason of unlink.
     */
    public function unlinkReason()
    {
        return $this->belongsTo(UnlinkReason::class);
    }


    
    /**
     * Saves mobility pairings in the database.
     * 
     * @param   Mobility    $mobility   Mobility instance
     * @param   Array   $semester   Validated Array of Date years of the mobility
     * @param   Array   $pairings   Validated Array of the mobility's courses 
     */
    public static function saveMobilityPairings($mobility, $semester, $pairings)
    {
        foreach ($semester as $sem => $year) {
            if (($pairings[$sem] == null) || (count($pairings[$sem]) == 0)) {
                // error
                return;
            }
            foreach ($pairings[$sem] as $pairing) {
                $pair = new Pairing;
                    $pair->is_summer = $sem === 'summer';
                    $pair->year = $year;
                    $pair->associateForeignCourse(
                            $mobility->university->id, 
                            $pairing['foreignCode'], 
                            $pairing['foreignName']
                    );
                    $pair->associateHomeCourse(
                            $pairing['homeCode'], 
                            $pairing['homeName']
                    );
                    $pair->associateMobility($mobility);
                $pair->save();
            }
        }
    }

    public function associateForeignCourse($uniID, $name)
    {
        $this->foreignCourse()->associate(
            ForeignCourse::getCourse($uniID, $name)
        );
    } 

    public function associateHomeCourse($data)
    {
        $this->homeCourse()->associate(
            HomeCourse::getCourse($data)
        );
    }

    public function associateMobility($mobility)
    {
        $this->mobility()->associate($mobility);
    }

    public function saveRating($rating)
    {
        $this->rating = $rating;
        $this->save();
    }

    public static function getSemestersOfMobility($mobilityID) 
    {
        return DB::table('pairings')
            ->select('is_summer', 'year')
                ->distinct()
                ->where('mobility_id', $mobilityID)
                ->orderBy('year', 'asc')
                ->get();
    }

    public static function import($mobility, $pairings, $uni) 
    {
        foreach ($pairings as $pairing) {
            self::createNew($mobility, $pairing, $uni);
        }
    }

    private static function createNew($mobility, $data, $uni)
    {
        $pairing = new Pairing;
            $pairing->foreignCourse()->associate(ForeignCourse::get(
                $uni, 
                $data->foreignCourse->data
            ));
            $pairing->homeCourse()->associate(HomeCourse::get($data->homeCourse));
            $pairing->setState($data->data);
            $pairing->mobility()->associate($mobility);
        $pairing->save();
    }


    public function setState($state)
    {
        if ($state == 'Smazaný') {
            $this->reason_id = 1;
        }
    }

    public static function getUniPairings()
    {
        if ($courses = HomeCourse::getSession()) {
            Pairing::whereHas('homeCourse', function (Builder $query) {
                $query->where('content', 'like', 'code%');
            })->get();
        }
    }
}
