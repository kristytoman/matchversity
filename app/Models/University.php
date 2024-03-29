<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
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
     * @var string[]
     */
    protected $with = ['city', 'foreignCourses'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Get mobilities of the university.
     * @return HasMany
     */
    public function mobilities(): HasMany
    {
        return $this->hasMany(Mobility::class);
    }

    /**
     * Get courses of the university.
     * @return HasMany
     */
    public function foreignCourses(): HasMany
    {
        return $this->hasMany(ForeignCourse::class);
    }

    /**
     * Get university of the mobility.
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Store data about university into the database.
     *
     * @param array $data
     * @return University
     */
    public static function createProfile($data)
    {
        $uni = new University;
        $uni->name = $data['nameEN'];
        $uni->original_name = $data['nameDB'];
        $uni->native_name = $data['nameORG'];
        $uni->web = $data['web'];
        $uni->xchange_link = $data['xchangeLink'];
        $uni->xchange_id = $data['xchangeID'];
        $uni->city()->associate($data['city']);
        $uni->save();
        return $uni;
    }

    /**
     * Update data in the database.
     *
     * @param int $uniID
     * @param array $data
     * @return void
     */
    public static function updateProfile($uniID, $data)
    {
        $uni = University::find($uniID);
        if ($uni instanceof University) {
            $uni->name = $data['name'];
            $uni->native_name = $data['native_name'];
            $uni->web = $data['web'];
            $uni->xchange_id = $data['xchange'];
            $uni->xchange_link = $data['xchange_link'];
            $uni->associateCity($data);
            $uni->save();
        }
    }

    /**
     * Return foreign courses assigned to the university.
     *
     * @param int $id
     * @return Collection
     */
    public static function getForeignCourses($id)
    {
        return ForeignCourse::where('university_id', '=', $id)->get();
    }

    /**
     * Return mobilities assigned to the university.
     *
     * @param int $id
     * @return Collection
     */
    public static function getMobilities($id)
    {
        return Mobility::where('university_id', '=', $id)->get();
    }

    /**
     * Merge universities.
     *
     * @param int $connect
     * @param int $connectTo
     * @return void
     */
    public static function connectProfiles($connect, $connectTo)
    {
        foreach (University::getForeignCourses($connect) as $course) {
            $course->changeUniversity($connectTo);
        }
        foreach (University::getMobilities($connect) as $mobility) {
            $mobility->changeUniversity($connectTo);
        }
        University::destroy($connect);
    }

    /**
     * Associate city with the university.
     *
     * @param array $data
     * @return void
     */
    public function associateCity($data)
    {
        $this->city()->associate(City::add($data['city'], $data['country']));
    }

    /**
     * Return university by it's original name.
     *
     * @param string $name
     * @param string $city
     * @return University
     */
    public static function get($name, $city)
    {
        $uni = self::firstOrCreate([
            'original_name' => $name
        ]);
        if (!$uni->city) {
            $uni->city()->associate(City::getCity($city));
        }
        return $uni;
    }

    /**
     * Return list of all universities.
     *
     * @return Collection
     */
    public static function getAll()
    {
        return self::all();
    }

    /**
     * Return number of all stored universities.
     *
     * @return int
     */
    public static function getCount()
    {
        return self::all()->count();
    }

    /**
     * Return university instance.
     *
     * @param int $id
     * @return University|null
     */
    public static function getById($id)
    {
        return University::find($id);
    }

    /**
     * Return list of universities based on search request.
     *
     * @return Collection
     */
    public static function findResults()
    {
        return University::when($request = HomeCourse::getSession(), function ($query, $request) {
            $query->whereHas('mobilities', function (Builder $query) use ($request) {
                $query->whereHas('pairings', function (Builder $query) use ($request) {
                    $query->whereHas('homeCourse', function (Builder $query) use ($request) {
                        if (is_array($request)) {
                            $query->whereIn('code', $request['codes'])
                                ->orWhereIn('group', $request['groups']);
                        }
                    });
                });
            });
        })->when($request = Country::getSession(), function ($query, $request) {
            $query->whereHas('city', function (Builder $query) use ($request) {
                $query->whereIn('country_id', $request);
            });
        })->withCount('mobilities')->orderBy('mobilities_count', 'desc')->paginate(15);
    }


    /**
     * Update courses of the university.
     *
     * @param array $data
     * @param int $id
     * @return void
     */
    public static function updateForeignCourses($data, int $id)
    {
        $university = University::find($id);
        if ($university instanceof University && array_key_exists($id, $data['courses'])) {
            foreach ($data['courses'][$id] as $courseID => $name) {
                $course = ForeignCourse::find($courseID);
                if ($course instanceof ForeignCourse) {
                    if ($course->name != $name) {
                        $secondCourse = ForeignCourse::where('name', $name)->where('university_id', $id)->first();
                        if ($secondCourse instanceof ForeignCourse) {
                            if ($secondCourse->name == $name) {
                                ForeignCourse::repair($courseID, $secondCourse->id);
                            } else {
                                $course->changeName($id, $name);
                            }
                        } else {
                            $course->changeName($id, $name);
                        }
                    }
                }
            }
        }
    }
}
