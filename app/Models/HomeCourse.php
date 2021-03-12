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

    public static function get($homeCourse) 
    {
        return self::firstOrCreate([
            'code' => $homeCourse['code'],
            'name' => $homeCourse['name']
        ]);
    }
}
