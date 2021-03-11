<?php

namespace App\Models\Validation;

use Illuminate\Database\Eloquent\Model;
use ImportColumns;

class MobilityValidator
{
    public $student;

    public $arrival;

    public $departure;

    public $year;

    public $semester;

    public $university;

    public $city;

    public $pairings;

    public $isValid;

    public function __construct($data)
    {
        $this->student = new StudentValidator($data[ImportColumns::STUDENT_ID]);
        $this->arrival = new ArrivalValidator($data[ImportColumns::START]);
        $this->departure = new DepartureValidator($data[ImportColumns::END], $this->arrival->data);
        $this->semester = new SemesterValidator($data[ImportColumns::SEMESTER], $this->arrival);
        $this->year = new YearValidator($data[ImportColumns::YEAR],$this->arrival,$this->semester);
        $this->university = new UniversityValidator($data[ImportColumns::UNIVERSITY]);
        $this->city = $data[ImportColumns::CITY];
        $courseList = $this->getCourses($data[ImportColumns::HOME_COURSE]);
        foreach ($courseList as $course) {
            $this->pairings = [new PairingValidator($course, $data, $this->year)];
        }
    }

    public static function getCourses($courses)
    {
        return explode(", ", $courses);
    }

    public function addPairing($data)
    {
        $courseList = $this->getCourses($data[ImportColumns::HOME_COURSE]);
        foreach ($courseList as $course) {
            array_push($this->pairings, new PairingValidator($course, $data, $this->year));
        }
    }

    public function validate()
    {
        $valid = true;
        $this->student->validate();
            $this->arrival->validate();
            $this->departure->validate();
            $this->semester->validate();
            $this->year->validate();
            $this->university->validate();
        foreach ($this->pairings as $pairing) {
            $pairing->validate();
        }
        $this->isValid = $valid;
        return $valid;
    }
}
