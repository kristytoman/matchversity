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

    public function __construct()
    {

    }

    public static function fromFile($data)
    {
        $new = new MobilityValidator;
        $new->student = new StudentValidator($data[ImportColumns::STUDENT_ID]);
        $new->arrival = new ArrivalValidator($data[ImportColumns::START]);
        $new->departure = new DepartureValidator($data[ImportColumns::END], $new->arrival->data);
        $new->semester = new SemesterValidator($data[ImportColumns::SEMESTER], $new->arrival);
        $new->year = new YearValidator($data[ImportColumns::YEAR], $new->arrival, $new->semester);
        $new->university = new UniversityValidator($data[ImportColumns::UNIVERSITY]);
        $new->city = $data[ImportColumns::CITY];
        $courseList = $new->getCourses($data[ImportColumns::HOME_COURSE]);
        foreach ($courseList as $course) {
            $new->pairings = [PairingValidator::fromFile($course, $data, $new->year)];
        }
        return $new;
    }

    public static function getCourses($courses)
    {
        return explode(", ", $courses);
    }

    public function addPairing($data)
    {
        $courseList = $this->getCourses($data[ImportColumns::HOME_COURSE]);
        foreach ($courseList as $course) {
            array_push($this->pairings, PairingValidator::fromFile($course, $data, $this->year));
        }
    }

    public function validate()
    {
        $this->message = "";
        $validations = [
            $this->student->validate(),
            $this->arrival->validate(),
            $this->departure->validate(),
            $this->semester->validate(),
            $this->year->validate(),
            $this->university->validate()
        ];
        foreach ($this->pairings as $pairing) {
            array_push($validations, $pairing->validate());
        }
        $this->isValid = !in_array(false, $validations);
        return $this->isValid;
    }

    public static function fromForm($form)
    {
        $mobilities = [];
        foreach ($form['mobility'] as $mobility) {
            $toSave = new MobilityValidator;
            $toSave->student = new StudentValidator($mobility['student']);
            $toSave->arrival = new ArrivalValidator($mobility['arrival']);
            $toSave->departure = new DepartureValidator($mobility['departure'], $toSave->arrival->data);
            $toSave->semester = new SemesterValidator($mobility['semester'], $toSave->arrival);
            $toSave->year = new YearValidator($mobility['year'], $toSave->arrival, $toSave->semester);
            $toSave->university = new UniversityValidator($mobility['university']);
            $toSave->city = $mobility['city'];
            $toSave->pairings = [];
            foreach ($mobility['pairing'] as $pairing) {
                array_push(
                    $toSave->pairings,
                    PairingValidator::fromForm($pairing)
                );
            }
            array_push($mobilities, $toSave);
        }
        return $mobilities;
    }
}
