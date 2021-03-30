<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Get university of the course.
     */
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    /**
     * Get pairings associated with the course.
     */
    public function pairings()
    {
        return $this->hasMany(Pairing::class);
    }

    /**
     * Get the instance of the model.
     *
     * @param int  $uniID
     * @param string  $name
     * @return ForeignCourse
     */
    public static function get($uniId, $name)
    {
        return self::firstOrCreate([
            'name' => $name,
            'university_id' => $uniId
        ]);
    }

    /**
     * Return the number of data stored
     * in the database.
     *
     * @return int
     */
    public static function getCount()
    {
        return self::all()->count();
    }

    /**
     * Update the university column of the course.
     *
     * @param int  $uniID
     */
    public function changeUniversity($uniID)
    {
        $this->university()->associate(University::find($uniID));
        $this->save();
    }
}
