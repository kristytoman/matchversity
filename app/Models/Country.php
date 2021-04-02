<?php

namespace App\Models;

use DB;
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

    public static function getAvailable()
    {
        return DB::table('countries')->join('cities', function($join1) {
            $join1->on('cities.country_id', '=', 'countries.id')
            ->join('universities', function($join2){
                $join2->on('universities.city_id', '=', 'cities.id')
                ->join('mobilities', function($join3){
                    $join3->on('mobilities.university_id', '=', 'universities.id')
                    ->join('pairings', function($join4) {
                        $join4->on('pairings.mobility_id', '=', 'mobilities.id')
                        ->join('home_courses', function($join5) {
                            $courses = HomeCourse::getSession(session('courses'));
                            $join5->on('home_courses.id', '=', 'pairings.home_course_id')
                            ->whereIn('home_courses.group', $courses['groups'])
                            ->orWhereIn('home_courses.code', $courses['codes']);
                        });
                    });
                });
            });
        })->select('countries.id')->distinct()->get();
    }
}
