<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

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
     * Gets universities of the location.
     */
    public function universities()
    {
        return $this->hasMany(University::class);
    }

    /**
     * Creates or finds an instance of University location in the database.
     * 
     * @param   String  $city   City name
     * @param   String  $country    Country name
     * @param   String  $continent  Continent name
     * @return  Location    
     */
    public static function GetLocation($city, $country, $continent)
    {
        return Location::firstOrCreate(
                [
                    'city' => $city,
                    'country' => $country,
                    'continent' => $continent
                ]);
    }

}
