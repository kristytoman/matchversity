<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ImportColumns;


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
     * @var array
     */
    protected $guarded = [];

    /**
     * Get pairings associated with the course.
     */
    public function pairings()
    {
        return $this->hasMany(Pairing::class);
    }

    /**
     * The users that belong to the role.
     */
    public function fields()
    {
        return $this->belongsToMany(Field::class);
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
     * @param array $homeCourse
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
     *
     * @return Illuminate\Support\Collection
     */
    public static function allOrderedByName()
    {
        return self::select()->orderBy('name_cz')->get();
    }

    /**
     * Change the group associated with the course.
     *
     * @param array  $data
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
     * @param int  $id
     * @param int  $group
     */
    public static function addToGroup($id, $group)
    {
        $course = HomeCourse::find($id);
        $course->group = $group;
        $course->save();
    }

    /**
     * Set the courses session.
     *
     * @param array  $request
     */
    public static function setSession($request)
    {
        if (array_key_exists('courses', $request)) {
            session(['courses' => json_encode(self::getGroupsAndCourses(array_keys($request['courses'])))]);
        }
        else {
            session(['courses' => "" ]);
        }
    }
    
    public static function getGroupsAndCourses($request)
    {
        $courses = [ 'groups' => [], 'codes' => []];
        foreach($request as $code) {
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
        return json_decode(session('courses'), true);
    }
}
