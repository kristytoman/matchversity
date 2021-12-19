<?php

namespace App\Models;

use App\Models\Validation\HomeCourseValidator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Pagination\Paginator;

class HomeCourse extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'home_courses';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The relationships that should always be loaded.
     *
     * @var string[]
     */
    protected $with = ['fields'];

    /**
     * Get pairings associated with the course.
     * @return HasMany
     */
    public function pairings(): HasMany
    {
        return $this->hasMany(Pairing::class);
    }

    /**
     * The users that belong to the role.
     * @return BelongsToMany
     */
    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'field_courses')
            ->withPivot('is_summer', 'compulsory', 'grade');
    }

    /**
     * Find a course by its code
     *
     * @param string $code
     * @return HomeCourse|null
     */
    public static function findByCode($code)
    {
        return self::where('code', '=', $code)->first();
    }

    /**
     * Get the course instance.
     *
     * @param HomeCourseValidator $homeCourse
     * @return HomeCourse
     */
    public static function get($homeCourse)
    {
        return self::firstOrCreate([
            'code' => $homeCourse->data,
            'name_cz' => $homeCourse->nameCZ,
            'name_en' => $homeCourse->nameEN
        ]);
    }

    /**
     * Get all data from the database
     * ordered by the czech name.
     * @return Paginator
     */
    public static function allOrderedByName(): Paginator
    {
        return self::select()->orderBy('name_cz')->simplePaginate(15);
    }

    /**
     * Change the group associated with the course.
     *
     * @param array $data
     * @return void
     */
    public static function changeGroups($data)
    {
        foreach ($data['group'] as $key => $value) {
            HomeCourse::addToGroup($key, $value);
        }
    }

    /**
     * Add the course to the group.
     *
     * @param int $id
     * @param int $group
     * @return void
     */
    public static function addToGroup($id, $group)
    {
        $course = HomeCourse::find($id);
        if ($course instanceof HomeCourse) {
            $course->group = $group;
            $course->save();
        }
    }

    /**
     * Set the courses session.
     *
     * @param array $request
     * @return void
     */
    public static function setSession($request)
    {
        if (array_key_exists('courses', $request)) {
            session(['courses' => json_encode(self::getGroupsAndCourses($request['courses']))]);
        } else {
            session(['courses' => ""]);
        }
    }

    /**
     * Set the courses session.
     *
     * @param array $request
     * @return array
     */
    public static function getGroupsAndCourses($request)
    {
        $courses = ['groups' => [], 'codes' => []];
        foreach ($request as $code) {
            if ($course = self::findByCode($code)) {
                $courses['codes'][] = $code;
                if ($course->group) {
                    $courses['groups'][] = $course->group;
                }
            }
        }
        return $courses;
    }

    /**
     * Get the courses session.
     *
     * @return array|null
     */
    public static function getSession()
    {
        $courses = session('courses');
        if (is_string($courses)) {
            $decodedCourses = json_decode($courses, true);
            return is_array($decodedCourses) ? $decodedCourses : [];
        }
        return [];
    }
}
