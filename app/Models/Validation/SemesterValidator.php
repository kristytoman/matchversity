<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class SemesterValidator extends DataValidator
{
    public $arrival;

    public function __construct($data, $arrival)
    {
        $this->data = $data;
        $this->arrival = $arrival;
    }

    public function validate() 
    {
        if (empty($this->data)) {
            return $this->result("Missing mobility semester");
        }
        if (($this->data !== "ZS") && ($this->data !== "LS")) {
            return $this->result("Wrong mobility semester format. Accepting only 'ZS' or 'LS'.");
        }
        if ($this->arrival->isValid) {
            $month = $this->arrival->getMonth();
            if (($this->data === "ZS") && (($month < 5) || ($month === 12))) {
                $this->data = "LS";
                return $this->result("Semester was changed to fit the arrival");
            }
            if (($this->data === "LS") && (($month > 7) && ($month < 12))) {
                $this->data = "ZS";
                return $this->result("Semester was changed to fit the arrival");
            }
            return $this->result("");
        }
        return $this->result("");
    }
}