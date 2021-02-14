<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeCourse;
use App\Models\ForeignCourse;
use DatabaseNames;


class Pairing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = DatabaseNames::PAIRINGS_TABLE;

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
    protected $with = ['homeCourse', 'foreignCourse'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        DatabaseNames::REASON_ID_COLUMN => null
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

    public function associateForeignCourse($uniID, $code, $name)
    {
        $this->foreignCourse()->associate(
            ForeignCourse::getCourse($uniID, $code, $name)
        );
    } 

    public function associateHomeCourse($code, $name)
    {
        $this->homeCourse()->associate(
            HomeCourse::getCourse($code, $name)
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
        return DB::table(DatabaseNames::PAIRINGS_TABLE)
            ->select(DatabaseNames::IS_SUMMER_COLUMN, DatabaseNames::YEAR_COLUMN)
                ->distinct()
                ->where(DatabaseNames::MOBILITY_ID_COLUMN, $mobilityID)
                ->orderBy(DatabaseNames::YEAR_COLUMN, 'asc')
                ->get();
    }

    public static function importPairings($file) 
    {
        foreach ($file->rows() as $row) {
            $mobility = new Mobility;
            $mobility->student = hash("sha256", $row[0], false);
        }
    }
}
