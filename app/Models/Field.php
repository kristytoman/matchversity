<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
     * @var string

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fields';

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
     * Gets university of the course.
     */
    public function faculty() 
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Gets pairings of the course.
     */
    public function homeCourses() 
    {
        return $this->belongsToMany(HomeCourse::class, 'field_courses');
    }

    public static function getFieldById($id)
    {
        return self::find($id);
    }

    public static function getField($fieldID, $degree, $facultyId)
    {
        return self::firstOrCreate([
            'id' => $fieldID,
            'degree' => $degree,
            'faculty_id' => $facultyId
        ]);
    }
}
