<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * @return HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    /**
     * Set countries session.
     *
     * @param array $request
     * @return void
     */
    public static function setSession(array $request)
    {
        if (array_key_exists('countries', $request)) {
            session(['countries' => json_encode($request['countries'])]);
        } else {
            session(['countries' => ""]);
        }
    }

    /**
     * Get countries session.
     *
     * @return array
     */
    public static function getSession(): array
    {
        $countries = session('countries');
        if (is_string($countries)) {
            $decodedCountries = json_decode($countries);
            if (is_array($decodedCountries)) {
                return $decodedCountries;
            }
        }
        return [];
    }

    /**
     * Get available countries for courses set in session.
     * @return Collection
     */
    public static function getAvailable(): Collection
    {
        return Country::whereHas('cities', function (Builder $query) {
            $query->whereHas('universities', function (Builder $query) {
                $query->whereHas('foreignCourses', function (Builder $query) {
                    $query->whereHas('pairings', function (Builder $query) {
                        $query->whereHas('homeCourse', function (Builder $query) {
                            $courses = HomeCourse::getSession();
                            if (is_array($courses)) {
                                $query->whereIn('group', $courses['groups'])
                                    ->orWhereIn('code', $courses['codes']);
                            }
                        });
                    });
                });
            });
        })->get();
    }
}
