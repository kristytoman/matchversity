<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use DatabaseNames;
use DB;

class University extends Model
{

    public $xchangeLink;
    public $rating;
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
    public $timestamps = true;

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
    public static function createProfile($englishName, $originalName, $nativeName, $xchange, $web, $city)
    {
        $uni = new University;
            $uni->name = $englishName;
            $uni->original_name = $originalName;
            $uni->native_name = $nativeName;
            $uni->web = $web;
            $uni->xchange = $xchange;
            $uni->city()->associate($city);
        $uni->save();
        return $uni;
    }

    public static function get($name, $city)
    {
        $uni = self::firstOrCreate([
            'original_name' => $name
        ]);
        if(!$uni->city()) {
            $uni->city()->associate(City::getCity($city));
        }
        return $uni;
    }

    public static function getAll()
    {
        $unis = self::all();
        foreach($unis as $uni) {
            $uni->getXchange();
        }
        return $unis;
    }

    private function getXchange()
    {
        $this->xchangeLink = 'https://xchange.utb.cz/instituce/' . $this->xchange . '-' .
            DB::connection('xchange')->table('institutions')->select('url')->where('id', $this->xchange)->first();
        $this->rating = DB::connection('xchange')->table('reviews')->where('institution_id',$this->xchange)->avg();
    }
}
