<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Get university of the course.
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    /**
     * Get pairings associated with the course.
     * @return HasMany
     */
    public function pairings(): HasMany
    {
        return $this->hasMany(Pairing::class);
    }

    /**
     * Get the instance of the model.
     *
     * @param int $uniId
     * @param string $name
     * @return ForeignCourse
     */
    public static function get(int $uniId, string $name): ForeignCourse
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
     * @param int $uniID
     * @return void
     */
    public function changeUniversity(int $uniID)
    {
        $this->university()->associate(University::find($uniID));
        $this->save();
    }

    /**
     * Update the name of the course.
     *
     * @param int $university
     * @param string $name
     * @return void
     */
    public function changeName(int $university, string $name)
    {
        if ($this->university_id == $university && $name != $this->name) {
            $this->name = $name;
            $this->save();
        }
    }

    /**
     * Return pairings associated with this course.
     * @return Collection
     */
    public function getPairings(): Collection
    {
        return Pairing::where('foreign_course_id', '=', $this->id)->get();
    }

    /**
     * Merge courses together.
     *
     * @param int $from
     * @param int $to
     * @return void
     */
    public static function repair(int $from, int $to)
    {
        $course = ForeignCourse::find($from);
        if ($course instanceof ForeignCourse) {
            foreach ($course->getPairings() as $pairing) {
                $pairing->foreign_course_id = $to;
                $pairing->save();
            }
            $course->delete();
        }
    }

    /**
     * Return all mobilities associated with the university.
     *
     * @param int $id
     * @return LengthAwarePaginator
     */
    private static function getAllFromUni($id): LengthAwarePaginator
    {
        return ForeignCourse::where('university_id', $id)
            ->with([
                'pairings.mobility',
                'pairings.homeCourse',
                'pairings.reason'
            ])->paginate(15);
    }

    /**
     * Return all mobilities associated with the university
     * that contains selected courses.
     *
     * @param int $id
     * @return Collection
     */
    private static function getSelectedFromUni(int $id): Collection
    {
        return ForeignCourse::where('university_id', $id)
            ->whereHas('pairings', function (Builder $query) {
                $query->whereHas('homeCourse', function (Builder $query) {
                    $courses = HomeCourse::getSession();
                    if (is_array($courses)) {
                        $query->whereIn('group', $courses['groups'])
                            ->orWhereIn('code', $courses['codes']);
                    }
                });
            })->with(['pairings.mobility', 'pairings.homeCourse', 'pairings.reason'])
            ->get();
    }

    /**
     * Return mobilities for the university profile.
     *
     * @param int $id
     * @return array
     */
    public static function getUniversityData(int $id): array
    {
        $courses = HomeCourse::getSession();
        $data = ['all' => self::getAllFromUni($id)];
        $data['searched'] = HomeCourse::getSession() ? self::getSelectedFromUni($id) : null;
        return $data;
    }
}
