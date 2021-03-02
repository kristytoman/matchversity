<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ImportColumns;


class HomeCourse extends Model
{
    use HasFactory;

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

    public static function getCourses($data)
    {
        $courses = [];
        $courseList = explode(", ", $data[ImportColumns::HOME_COURSE]);
        $field = Field::getFieldById($data[ImportColumns::FIELD], $data[ImportColumns::FACULTY]);
        foreach ($courseList as $code) {
            $course = getCourse($code);
            $course->fields()->attach($field);
            array_push($courses);
        }
        return $courses;
    }


    public static function getCourse($code) 
    {
        return self::firstOrCreate([
            'code' => $code
        ]);
    }
}
