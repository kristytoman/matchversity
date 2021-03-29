<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    public $timestamps = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Gets pairings of the course.
     */
    public function pairings() 
    {
        return $this->hasMany(Pairing::class);
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'field_courses');
    }

    public static function findByCode($code)
    {
        return self::where('code', '=', $code)->first();
    }

    public static function get($homeCourse) 
    {
        return self::firstOrCreate([
            'code' => $homeCourse->data,
            'name_cz' => $homeCourse->nameCZ,
            'name_en' => $homeCourse->nameEN
        ]);
    }

    public static function allOrderedByName()
    {
        return self::select()->orderBy('name_cz')->get();
    }

    public static function changeGroups($data)
    {
        foreach ($data['group'] as $key => $value) {
            HomeCourse::addToGroup($key, $value);
        }
    }

    public static function addToGroup($id, $group)
    {
        $course = HomeCourse::find($id);
        $course->group = $group;
        $course->save();
    }

    public static function setSession($request)
    {
        if ($request['courses']) {
            $courses = [
                'groups' => [],
                'codes' => []
            ];
            foreach($request['courses'] as $code) {
                if ($course = self::findByCode($code)) {
                    $courses['codes'][] = $code;
                    if ($course->group) {
                        $course['groups'][] = $course->group;
                    }
                }
            }
            session(['courses' => json_encode($courses)]);
        }
        else {
            session(['courses' => "" ]);
        }
    }

    public static function getSession() 
    {
        return json_decode(session('courses'));
    }
}
