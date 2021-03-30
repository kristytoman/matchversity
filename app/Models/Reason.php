<?php

namespace App\Models;

use App\Models\Pairing;
use Illuminate\Database\Eloquent\Model;

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
     * Get mobility of the pairing.
     */
    public function pairings()
    {
        return $this->hasMany(Pairing::class);
    }

    /**
     * Creates new reason to unlink courses.
     * 
     * @param string  $answerCZ
     * @param string  $answerEN
     * @param bool  $isAdmin
     * @return int
     */
    public static function create($answerCZ, $answerEN, $isAdmin)
    {
        $reason = new Reason;
            $reason->description_cz = $answerCZ;
            $reason->description_en = $answerEN;
            $reason->is_verified = $isAdmin;
        $reason->save();
        return $reason->id;
    }

    /**
     * Set the verification column to true.
     * 
     * @param int  $id
     * @param array  $data
     */
    public static function verify($id, $data)
    {
        $reason = Reason::find($id);
            $reason->description_cz = $data['description_cz'];
            $reason->description_en = $data['description_en'];
            $reason->is_verified = true;
        $reason->save();
    }

    /**
     * Return pairings associated with this reason.
     * 
     * @return Illuminate\Support\Collection
     */
    public function getPairings()
    {
        return Pairing::where('reason_id', '=', $this->id);
    }

    /**
     * Merge reasons together.
     * 
     * @param int  $id
     * @param int  $toId
     */
    public static function change($id, $toId)
    {
        $reason = Reason::find($id);
        foreach ($reason->getPairings() as $pairing) {
            $pairing->reason_id = $toId;
            $pairing->save();
        }
        $reason->delete();
    }

    /**
     * Change the pairings associated with the reason
     * and delete the reason from the database.
     * 
     * @param int  $id
     */
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
