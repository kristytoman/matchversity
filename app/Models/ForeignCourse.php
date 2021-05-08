<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Update the name of the course.
     *
     * @param int  $university
     */
    public function changeName($university, $name)
    {
        if ($this->university_id == $university && $name != $this->name) {
            $this->name = $name;
            $this->save();
        }
    }

    /**
     * Return pairings associated with this course.
     * 
     * @return Illuminate\Support\Collection
     */
    public function getPairings()
    {
        return Pairing::where('foreign_course_id', '=', $this->id)->get();
    }

    /**
     * Merge courses together.
     * 
     * @param int  $from
     * @param int  $to
     */
    public static function repair($from, $to)
    {
        $course = ForeignCourse::find($from);
        foreach ($course->getPairings() as $pairing) {
            $pairing->foreign_course_id = $to;
            $pairing->save();
        }
        $course->delete();
    }

    
    /**
     * Return all mobilities associated with the university.
     * 
     * @param int  $id
     * @return array
     */
    private static function getAllFromUni($id)
    {
        return ForeignCourse::where('university_id', $id)
                            ->with([
                                'pairings.mobility',
                                'pairings.homeCourse',
                                'pairings.reason'
                            ])->get();
    }

    /**
     * Return all mobilities associated with the university
     * that contains selected courses.
     * 
     * @param int  $id
     * @return Illuminate\Support\Collection
     */
    private static function getSelectedFromUni($id)
    {
        return ForeignCourse::where('university_id', $id)
        ->whereHas('pairings',  function (Builder $query) {
            $query->whereHas('homeCourse', function (Builder $query) {
                $courses = HomeCourse::getSession();
                $query->whereIn('group', $courses['groups'])
                      ->orWhereIn('code', $courses['codes']);
            });
        })->with(['pairings.mobility', 'pairings.homeCourse', 'pairings.reason'])
          ->get();
    }

    /**
     * Return mobilities for the university profile.
     * 
     * @param int  $id
     * @return Illuminate\Support\Collection
     */
    public static function getUniversityData($id)
    {
        $courses = HomeCourse::getSession();
        $data = ['all' => self::getAllFromUni($id)];
        $data['searched'] = HomeCourse::getSession() ? self::getSelectedFromUni($id) : null;
        return $data;
    }
}
