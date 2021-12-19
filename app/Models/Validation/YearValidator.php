<?php

namespace App\Models\Validation;

class YearValidator extends DataValidator
{
    /**
     * The validator for the mobility start input.
     *
     * @var ArrivalValidator
     */
    protected $arrival;

    /**
     * The validator for the mobility semester input.
     *
     * @var SemesterValidator
     */
    protected $semester;

    /**
     * Create new instance for year input validation.
     *
     * @param string $data
     * @param ArrivalValidator $arrival
     * @param SemesterValidator $semester
     */
    public function __construct($data, $arrival, $semester)
    {
        parent::__construct($data);
        $this->data = $data;
        $this->arrival = $arrival;
        $this->semester = $semester;
    }

    /**
     * Validate the input data.
     *
     * @return bool
     */
    public function validate()
    {
        if (!preg_match("/[0-9]{4}/", $this->data)) {
            return $this->result("Wrong year format.");
        }
        if ($this->arrival->isValid && $this->semester->isValid) {
            $year = $this->arrival->getYear();
            if (($this->semester->data === "ZS") && ($year != $this->data)) {
                return $this->result("The year doesn't correspond to arrival.");
            }
            if ($this->semester->data === "LS") {
                if ($year != $this->data) {
                    return $this->result("The year doesn't correspond to arrival.");
                }
            }
        }
        return $this->result("");
    }
}
