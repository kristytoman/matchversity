<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DatabaseNames;


class Reason extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = DatabaseNames::REASONS_TABLE;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        DatabaseNames::IS_VERIFIED_COLUMN => false
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

    public static function createNewReason($answer)
    {
        $reason = new Reason;
            $reason->description = $answer;
            $reason->save();
        return $reason->id;
    }
}
