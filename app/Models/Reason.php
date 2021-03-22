<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pairing;

class Reason extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reasons';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_verified' => false
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Gets mobility of the pairing.
     */
    public function pairings()
    {
        return $this->hasMany(Pairing::class);
    }

    public static function create($answerCZ, $answerEN, $isAdmin)
    {
        $reason = new Reason;
            $reason->description_cz = $answerCZ;
            $reason->description_en = $answerEN;
            //$reason->is_verified = $isAdmin;
        $reason->save();
        return $reason->id;
    }

    public static function verify($id, $data)
    {
        $reason = Reason::find($id);
            $reason->description_cz = $data['description_cz'];
            $reason->description_en = $data['description_en'];
            $reason->is_verified = true;
        $reason->save();
    }

    public function getPairings()
    {
        return Pairing::where('reason_id', '=', $this->id);
    }

    public static function change($id, $toId)
    {
        $reason = Reason::find($id);
        foreach ($reason->getPairings() as $pairing) {
            $pairing->reason_id = $toId;
            $pairing->save();
        }
        $reason->delete();
    }


    public static function deleteSafely($id)
    {
        $reason = Reason::find($id);
        foreach ($reason->getPairings() as $pairing) {
            $pairing->reason_id = 1;
            $pairing->save();
        }
        $reason->delete();
    }
}
