<?php

namespace App\Models;

use App\Models\ForeignCourse;
use App\Models\HomeCourse;
use DB;
use Illuminate\Database\Eloquent\Model;
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
    protected $with = ['homeCourse', 'foreignCourse', 'reason'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'reason_id' => null
    ];

    /**
     * Get home course associated with the pairing.
     */
    public function homeCourse()
    {
        return $this->belongsTo(HomeCourse::class);
    }

    /**
     * Get foreign course associated with the pairing.
     */
    public function foreignCourse()
    {
        return $this->belongsTo(ForeignCourse::class);
    }

    /**
     * Get mobility associated with the pairing.
     */
    public function mobility()
    {
        return $this->belongsTo(Mobility::class);
    }

    /**
     * Get reason of unlinking.
     */
    public function reason()
    {
        return $this->belongsTo(Reason::class);
    }

    /**
     * Associate the foreign course with the instance.
     * 
     * @param int  $uniID
     * @param string  $name
     */
    public function associateForeignCourse($uniID, $name)
    {
        $this->foreignCourse()->associate(
            ForeignCourse::get($uniID, $name)
        );
    } 

    /**
     * Associate the home course with the instance.
     * 
     * @param array  $data
     */
    public function associateHomeCourse($data)
    {
        $this->homeCourse()->associate(
            HomeCourse::get($data)
        );
    }

    /**
     * Associate the mobility with the instance.
     * 
     * @param Mobility  $mobility
     */
    public function associateMobility($mobility)
    {
        $this->mobility()->associate($mobility);
    }

    /**
     * Update the rating column in the database.
     * 
     * @param int  $rating
     */
    public function saveRating($rating)
    {
        $this->rating = $rating;
        $this->save();
    }

    /**
     * Import pairings associated with the mobility.
     * 
     * @param Mobility  $mobility
     * @param array  $pairings
     * @param int  $uni
     */
    public static function import($mobility, $pairings, $uni) 
    {
        foreach ($pairings as $pairing) {
            self::createNew($mobility, $pairing, $uni);
        }
    }

    /**
     * Save new pairing to the database.
     * 
     * @param Mobility  $mobility
     * @param array  $data
     * @param int  $uni
     */
    private static function createNew($mobility, $data, $uni)
    {
        $pairing = new Pairing;
            $pairing->associateForeignCourse($uni, $data->foreignCourse->data);
            $pairing->associateHomeCourse($data->homeCourse);
            $pairing->setState($data->data);
            $pairing->associateMobility($mobility);
        $pairing->save();
    }

    /**
     * Set the type of the pairing.
     * 
     * @param string  $state
     */
    public function setState($state)
    {
        if ($state == 'Smazaný') {
            $this->reason_id = 1;
        }
    }
}
