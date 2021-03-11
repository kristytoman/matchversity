<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

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
     * Gets universities of the location.
     */
    public function universities()
    {
        return $this->hasMany(University::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    /**
     * Creates or finds an instance of University location in the database.
     * 
     * @param   String  $city   City name
     * @param   String  $country    Country name
     * @return  City    
     */
    public static function getCity($city)
    {
        return self::firstOrCreate([
            'name' => $city
        ]);
    }
}
