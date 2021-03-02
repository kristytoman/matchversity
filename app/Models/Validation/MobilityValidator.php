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

    public $field;

    public $faculty;

    public $degree;

    public $pairings;

    public $isValid;

    public function __construct($data)
    {
        $this->student = new StudentValidator($data[ImportColumns::STUDENT_ID]);
        $this->arrival = new ArrivalValidator($data[ImportColumns::START]);
        $this->departure = new DepartureValidator($data[ImportColumns::END], $this->arrival->data);
        $this->year = new YearValidator($data[ImportColumns::YEAR]);
        $this->semester = new SemesterValidator($data[ImportColumns::SEMESTER]);
        $this->university = new UniversityValidator($data[ImportColumns::UNIVERSITY]);
        $this->field = new FieldValidator($data[ImportColumns::FIELD]);
        $this->faculty = new FacultyValidator($data[ImportColumns::FACULTY]);
        $this->degree = new DegreeValidator($data[ImportColumns::DEGREE]);
        $courseList = $this->getCourses($data[ImportColumns::HOME_COURSE]);
        foreach ($courseList as $course) {
            $this->pairings = [
                new PairingValidator(
                    $course, 
                    $data[ImportColumns::FOREIGN_COURSE],
                    $data[ImportColumns::PAIRING_TYPE]
                )
            ];
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
            array_push($this->pairings, 
                new PairingValidator(
                    $course, 
                    $data[ImportColumns::FOREIGN_COURSE],
                    $data[ImportColumns::PAIRING_TYPE]
                )
            );
        }
    }

    public function validate()
    {
        return true;
    }
}
