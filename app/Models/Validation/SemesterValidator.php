<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class SemesterValidator extends DataValidator
{
    /**
     * Data validator for the arrival
     * connected to the mobility.
     *
     * @var ArrivalValidator
     */
    public $arrival;


    /**
     * Create new instance for DataValidator.
     *
     * @param string  $data
     * @param ArrivalValidator  $arrival
     */
    public function __construct($data, $arrival)
    {
        $this->data = $data;
        $this->arrival = $arrival;
    }

    /**
     * Validate the input data.
     *
     * @return bool
     */
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Missing mobility semester");
        }
        if (($this->data !== "ZS") && ($this->data !== "LS")) {
            return $this->result("Wrong mobility semester format. Accepting only 'ZS' or 'LS'.");
        }
        return $this->correctData();
    }

    /**
     * Corrects data to fit the arrival.
     *
     * @return bool
     */
    private function correctData()
    {
        if ($this->arrival->isValid) {
            $month = $this->arrival->getMonth();
            if ($this->data === "ZS") {
                return $this->correctWinter($month);
            }
            return $this->correctSummer($month);
        }
        else {
            return $this->result("");
        }
    }

    /**
     * Corrects data to summer semester.
     *
     * @param int  $month
     * @return bool
     */
    private function correctWinter($month)
    {
        if (($month < 5) || ($month === 12)) {
            $this->data = "LS";
            return $this->result("Semester was changed to fit the arrival");
        }
        else {
             return $this->result("");
        }
    }

    /**
     * Corrects data to winter semester.
     *
     * @param int  $month
     * @return bool
     */
    private function correctSummer($month)
    {
        if (($month > 7) && ($month < 12)) {
            $this->data = "ZS";
            return $this->result("Semester was changed to fit the arrival");
        }
        else {
            return $this->result("");
       }
    }
}