<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;
use ImportColumns;

class PairingValidator extends DataValidator
{
    public $homeCourse;

    public $foreignCourse;

    public function __construct()
    {

    }

    public static function fromFile($course, $data, $year)
    {
        $toSave = new PairingValidator;
        $toSave->homeCourse = HomeCourseValidator::fromFile($course, $year);
        $toSave->foreignCourse = new ForeignCourseValidator($data[ImportColumns::FOREIGN_COURSE]);
        $toSave->data = $data[ImportColumns::PAIRING_TYPE];
        return $toSave;
    }

    public static function fromForm($pairing) 
    {
        $toSave = new PairingValidator;
        $toSave->homeCourse = HomeCourseValidator::fromForm($pairing['homeCourse']);
        $toSave->foreignCourse = new ForeignCourseValidator($pairing['foreignCourse']);
        $toSave->data = $pairing['type'];
        return $toSave;
    }

    public function validate()
    {
        $validations = [
            $this->homeCourse->validate(),
            $this->foreignCourse->validate()
        ];
        if (($this->data === "Přidaný") || ($this->data === "Normální") || ($this->data === "Smazaný")) {
            $this->isValid = !in_array(false, $validations);
        }
        else {
            $this->isValid = false;
            $this->message = "Wrong pairing type. Accepting 'Přidaný' or 'Normální' or 'Smazaný'.";
        }
        return $this->isValid;
    }
}