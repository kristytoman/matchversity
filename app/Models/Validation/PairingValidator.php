<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;
use ImportColumns;

class PairingValidator extends DataValidator
{
    public $homeCourse;

    public $foreignCourse;

    public $field;

    public $faculty;

    public $degree;

    public function __construct($course, $data, $year)
    {
        $this->homeCourse = new HomeCourseValidator($course, $year);
        $this->foreignCourse = new ForeignCourseValidator($data[ImportColumns::FOREIGN_COURSE]);
        $this->field = new FieldValidator($data[ImportColumns::FIELD]);
        $this->faculty = new FacultyValidator($data[ImportColumns::FACULTY]);
        $this->degree = new DegreeValidator($data[ImportColumns::DEGREE], $this->field);
        $this->data = $data[ImportColumns::PAIRING_TYPE];
    }

    public function validate()
    {
        $valid = true;
        $this->homeCourse->validate();
        $this->foreignCourse->validate();
        $this->field->validate();
        $this->faculty->validate();
        $this->degree->validate();
        if (($this->data === "Přidaný") || ($this->data === "Normální") || ($this->data === "Smazaný")) {
            $this->message = "";
        }
        else {
            $this->message = "Wrong pairing type. Accepting 'Přidaný' or 'Normální' or 'Smazaný'.";
            $valid = false;
        }
        $this->isValid = $valid;
        return $valid;
    }
}