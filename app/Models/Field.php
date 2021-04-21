<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Field extends Model
{

    /**
     * The users that belong to the role.
     */
    public function homeCourses()
    {
        return $this->belongsToMany(HomeCourse::class, 'field_courses')->withPivot('is_summer', 'compulsory', 'grade');
    }

    public static function getByFaculty($faculty, $type)
    {
        $lang = App::currentLocale() == 'cs' ? 'CZ' : "EN";
        return [ 
            'full' => Field::where('faculty', $faculty)
                           ->where('degree', $type)
                           ->where('lang', $lang)
                           ->where('fulltime', true)
                           ->get(),
            'part' => Field::where('faculty', $faculty)
                           ->where('degree', $type)
                           ->where('lang', $lang)
                           ->where('fulltime', false)
                           ->get()
        ];
    }

    public static function getCourses($id, $grade)
    {
        if ($field = self::find($id)) {
            return [ 'summer' => $field->homeCourses()->wherePivot('grade', '>=', $grade)
                ->wherePivot('compulsory', true)->wherePivot('is_summer', true)->distinct()->get()->unique('group')->keyBy('code'),
                'winter' => $field->homeCourses()->wherePivot('grade', '>=', $grade)
                ->wherePivot('compulsory', true)->wherePivot('is_summer', false)->distinct()->get()->unique('group')->keyBy('code')
        ];
        } 
        return [];
    }
}
