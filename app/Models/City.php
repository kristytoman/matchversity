<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['country'];

    /**
     * Get the universities of the location.
     */
    public function universities()
    {
        return $this->hasMany(University::class);
    }

    /**
     * Get the country associated with the city.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Create or find an instance of University location in the database.
     *
     * @param string  $city
     * @return City
     */
    public static function getCity(string $city)
    {
        return self::firstOrCreate([
            'name' => $city
        ]);
    }

    /**
     * Create or find an instance of University location in the database.
     *
     * @param string  $city
     * @param string  $country
     * @return City
     */
    public static function add(string $city, string $country)
    {
        return self::firstOrCreate([
            'name' => $city,
            'country_id' => $country
        ]);
    }
}
