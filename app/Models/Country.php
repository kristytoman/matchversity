<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Builder;
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
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['id' => 'string'];
    
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

    /**
     * Get available countries for courses set in session.
     *
     * @return Illuminate\Support\Collection
     */
    public static function getAvailable()
    {
        return Country::whereHas('cities', function (Builder $query) {
            $query->whereHas('universities', function (Builder $query) {
                $query->whereHas('foreignCourses', function (Builder $query) {
                    $query->whereHas('pairings', function (Builder $query) {
                        $query->whereHas('homeCourse', function (Builder $query) {
                            $courses = HomeCourse::getSession();
                            $query->whereIn('group', $courses['groups'])
                                ->orWhereIn('code', $courses['codes']);
                        });
                    });
                });
            });
        })->get();
    }
}
