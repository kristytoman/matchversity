<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DatabaseNames;


class ForeignCourse extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'foreign_courses';

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
    public function university() 
    {
        return $this->belongsTo(University::class);
    }

    /**
     * Gets pairings of the course.
     */
    public function pairings() 
    {
        return $this->hasMany(Pairing::class);
    }

    public static function getCourse($uniId, $name) 
    {
        return self::firstOrCreate([
            'name' => $name,
            'university_id' => $uniId
        ]);
    }
}
