<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class University extends Model
{
    use HasFactory;

    protected $table = 'universities';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

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
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    
    /**
     * Finds an university profile in a database or create a new one.
     *
     * @param  Array  $data  validated request data
     * @return  University
     */
    public static function GetUniversity($data)
    {
        if (!array_key_exists('uniID', $data))
        {
            return self::CreateNewUniProfile(
                        $data['name'],
                        $data['originalName'],
                        Location::GetLocation($data['city'], $data['country'], $data['continent']),
                        $data['web'],
                        $data['xchange'],
                        date($data['expiration'] . "-01 00:00:00")
                    );      
        }
        else
        {
            return self::find($data['uniID']);
        }
    }

    /**
     * Stores data about university into the database.
     * 
     * @param   String  $name   University name in English
     * @param   String  $originalName   Original university name
     * @param   Location    $location   University Location instance from datatabase
     * @param   String  $web    URL of university's web page
     * @param   String  $xchange    URL of university's progile on xchange portal
     * @param   String  $expiration Date of contract expiration
     * @return  University
     */
    public static function CreateNewUniProfile($name, $originalName, $location, $web, $xchange, $expiration)
    {
        $uni = new University;
            $uni->name = $name;
            $uni->originalName = $originalName;
            $uni->web = $web;
            $uni->xchange = $xchange;
            $uni->expiration = $expiration;
            $uni->location()->associate($location);
        $uni->save();
        return $uni;
    }

}
