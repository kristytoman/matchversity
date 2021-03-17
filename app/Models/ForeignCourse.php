<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DatabaseNames;


class ForeignCourse extends Model
{
    
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
    public $timestamps = true;

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

    public static function get($uniId, $name) 
    {
        return self::firstOrCreate([
            'name' => $name,
            'university_id' => $uniId
        ]);
    }

    public static function getCount()
    {
        return self::all()->count();
    }
}
