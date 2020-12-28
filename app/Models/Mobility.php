<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mobility extends Model
{
    use HasFactory;

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
}
