<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Gets universities of the location.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public static function setSession($request) 
    {
        if ($request['countries']) {
            session(['countries' => json_encode($request['countries'])]);
        }
        else {
            session(['countries' => ""]);
        }
    }

    public static function getSession()
    {
        return json_decode(session('countries'));
    }
}
