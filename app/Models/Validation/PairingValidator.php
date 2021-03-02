<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;
use ImportColumns;

class PairingValidator
{
    public $homeCourse;

    public $foreignCourse;

    public $type;

    public function __construct($homeCourse, $foreignCourse, $type)
    {
        $this->homeCourse = new HomeCourseValidator($homeCourse);
        $this->foreignCourse = new ForeignCourseValidator($foreignCourse);
        $this->type = $type;
    }

    public function validate()
    {
        // validate home course

        // validate foreign course

        // validate type
        return true;
    }
}