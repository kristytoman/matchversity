<?php

namespace App\Models\Validation;

use App\Constants\ImportColumns;

class MobilityValidator extends DataValidator
{
    /**
     * The validator for the student ID input.
     *
     * @var StudentValidator
     */
    public $student;

    /**
     * The validator for the mobility start input.
     *
     * @var ArrivalValidator
     */
    public $arrival;

    /**
     * The validator for the mobility end input.
     *
     * @var DepartureValidator
     */
    public $departure;

    /**
     * The validator for the mobility year input.
     *
     * @var YearValidator
     */
    public $year;

    /**
     * The validator for the mobility semester input.
     *
     * @var SemesterValidator
     */
    public $semester;

    /**
     * The validator for the mobility university input.
     *
     * @var UniversityValidator
     */
    public $university;

    /**
     * The validator for the university city input.
     *
     * @var string
     */
    public $city;

    /**
     * The validator for the mobility pairings input.
     *
     * @var array
     */
    public $pairings;

    /**
     * Validation result.
     *
     * @var bool
     */
    public $isValid;

    /**
     * Initialize validator from file input.
     *
     * @param array $data
     * @return MobilityValidator
     */
    public static function fromFile($data)
    {
        $new = new MobilityValidator("");
        $new->arrival = new ArrivalValidator($data[ImportColumns::START]);
        $new->departure = new DepartureValidator($data[ImportColumns::END], $new->arrival->data);
        $new->student = new StudentValidator($data[ImportColumns::STUDENT_ID], $new->arrival, $new->departure);
        $new->semester = new SemesterValidator($data[ImportColumns::SEMESTER], $new->arrival);
        $new->year = new YearValidator($data[ImportColumns::YEAR], $new->arrival, $new->semester);
        $new->university = new UniversityValidator($data[ImportColumns::UNIVERSITY]);
        $new->city = $data[ImportColumns::CITY];
        $new->pairings = [];
        $new->addPairing($data);
        return $new;
    }

    /**
     * Return courses from the input data.
     *
     * @param string $courses
     * @return array
     */
    public static function getCourses($courses)
    {
        return explode(", ", $courses);
    }

    /**
     * Add pairing data to the mobility.
     *
     * @param array $data
     * @return void
     */
    public function addPairing($data)
    {
        $courseList = $this->getCourses($data[ImportColumns::HOME_COURSE]);
        foreach ($courseList as $course) {
            array_push($this->pairings, PairingValidator::fromFile($course, $data, $this->year));
        }
    }

    /**
     * Validate the mobility.
     *
     * @return bool
     */
    public function validate()
    {
        $this->message = "";
        $this->isValid = !in_array(false, $this->getValidatedData());
        return $this->isValid;
    }

    /**
     * Returns results of validated mobility data.
     *
     * @return array
     */
    private function getValidatedData()
    {
        $validations = [
            $this->arrival->validate(),
            $this->departure->validate(),
            $this->student->validate(),
            $this->semester->validate(),
            $this->year->validate(),
            $this->university->validate()
        ];
        foreach ($this->pairings as $pairing) {
            array_push($validations, $pairing->validate());
        }
        return $validations;
    }

    /**
     * Initialize validator from form input.
     *
     * @param array $form
     * @return array
     */
    public static function fromForm($form)
    {
        $mobilities = [];
        foreach ($form['mobility'] as $mobility) {
            array_push($mobilities, self::createFromForm($mobility));
        }
        return $mobilities;
    }

    /**
     * Initialize validator from form input.
     *
     * @param array $mobility
     * @return MobilityValidator
     */
    public static function createFromForm($mobility)
    {
        $toSave = new MobilityValidator("");
        $toSave->arrival = new ArrivalValidator($mobility['arrival']);
        $toSave->departure = new DepartureValidator($mobility['departure'], $toSave->arrival->data);
        $toSave->student = new StudentValidator($mobility['student'], $toSave->arrival, $toSave->departure);
        $toSave->semester = new SemesterValidator($mobility['semester'], $toSave->arrival);
        $toSave->year = new YearValidator($mobility['year'], $toSave->arrival, $toSave->semester);
        $toSave->university = new UniversityValidator($mobility['university']);
        $toSave->city = $mobility['city'];
        $toSave->addFormPairings($mobility['pairing']);
        return $toSave;
    }

    /**
     * Add form pairings to the validator.
     *
     * @param array $pairings
     * @return void
     */
    public function addFormPairings(array $pairings)
    {
        $this->pairings = [];
        foreach ($pairings as $pairing) {
            array_push(
                $this->pairings,
                PairingValidator::fromForm($pairing)
            );
        }
    }
}
