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
     * Get cities associated with the country.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * Set countries session.
     *
     * @param array  $request
     */
    public static function setSession($request)    {
        if (array_key_exists('countries', $request)) {
            session(['countries' => json_encode($request['countries'])]);
        }
        else {
            session(['countries' => ""]);
        }
    }

    /**
     * Get countries session.
     *
     * @return array
     */
    public static function getSession()
    {
        return json_decode(session('countries'));
    }
}
