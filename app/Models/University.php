<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use DatabaseNames;

class University extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'universities';

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
    protected $with = ['city'];

    protected $guarded = [];

    /**
     * Gets mobilities of the university.
     */
    public function mobilities()
    {
        return $this->hasMany(Mobility::class);
    }

    /**
     * Gets courses of the university.
     */
    public function foreignCourses()
    {
        return $this->hasMany(ForeignCourse::class);
    }

    /**
     * Gets university of the mobility.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Finds an university profile in a database or create a new one.
     *
     * @param  Array  $data  validated request data
     * @return  University
     */
    public static function getUniversity($data)
    {
        if (!array_key_exists('uniID', $data)) {
            return self::createNewUniProfile(
                $data['name'],
                $data['originalName'],
                City::getCity($data['city'], $data['country'], $data['continent']),
                $data['web'],
                $data['xchange'],
                $data['expiration']
            );      
        }
        else {
            return self::find($data['uniID']);
        }
    }

    /**
     * Stores data about university into the database.
     * 
     * @param   String  $name   University name in English
     * @param   String  $originalName   Original university name
     * @param   City    $location   University Location instance from datatabase
     * @param   String  $web    URL of university's web page
     * @param   String  $xchange    URL of university's progile on xchange portal
     * @param   String  $expiration Date of contract expiration
     * @return  University
     */
    public static function createNewUniProfile($name, $originalName, $location, $web, $xchange, $expiration)
    {
        $uni = new University;
            $uni->name = $name;
            $uni->original_name = $originalName;
            $uni->web = $web;
            $uni->xchange = $xchange;
            $uni->expiration = $expiration;
            $uni->city()->associate($location);
        $uni->save();
        return $uni;
    }

    public static function get($name, $city)
    {
        $uni = self::firstOrCreate([
            'original_name' => $name
        ]);
        $uni->city()->associate(City::getCity($city));
        return $uni;
    }
}
