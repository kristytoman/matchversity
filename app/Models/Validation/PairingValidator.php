<?php

namespace App\Models\Validation;

use App\Constants\ImportColumns;

class PairingValidator extends DataValidator
{
    /**
     * Validator of the home course.
     *
     * @var HomeCourseValidator
     */
    public $homeCourse;

    /**
     * Validator of the foreign course.
     *
     * @var ForeignCourseValidator
     */
    public $foreignCourse;


    /**
     * Initialize validator from file input.
     *
     * @param string $course
     * @param array $data
     * @param YearValidator $year
     * @return PairingValidator
     */
    public static function fromFile(string $course, array $data, YearValidator $year): PairingValidator
    {
        $toSave = new PairingValidator($data[ImportColumns::PAIRING_TYPE]);
        $toSave->homeCourse = HomeCourseValidator::fromFile($course, $year);
        $toSave->foreignCourse = new ForeignCourseValidator($data[ImportColumns::FOREIGN_COURSE]);
        return $toSave;
    }

    /**
     * Initialize validator from form input.
     *
     * @param array $pairing
     * @return PairingValidator
     */
    public static function fromForm($pairing)
    {
        $toSave = new PairingValidator($pairing['type']);
        $toSave->homeCourse = HomeCourseValidator::fromForm($pairing['homeCourse']);
        $toSave->foreignCourse = new ForeignCourseValidator($pairing['foreignCourse']);
        return $toSave;
    }

    /**
     * Validate the pairing.
     *
     * @return bool
     */
    public function validate()
    {
        $this->isValid = !in_array(false, $this->getValidatedData());
        return $this->isValid;
    }

    /**
     * Validate the pairing type.
     *
     * @return bool
     */
    private function validateType()
    {
        if (($this->data === "Přidaný") || ($this->data === "Normální") || ($this->data === "Smazaný")) {
            return $this->result("");
        } else {
            return $this->result("Wrong pairing type. Accepting 'Přidaný' or 'Normální' or 'Smazaný'.");
        }
    }

    /**
     * Returns results of validated pairing data.
     *
     * @return array
     */
    private function getValidatedData()
    {
        return [
            $this->homeCourse->validate(),
            $this->foreignCourse->validate(),
            $this->validateType()
        ];
    }
}
