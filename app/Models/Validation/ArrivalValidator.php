<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class ArrivalValidator extends DataValidator
{
    public function validate()
    {
        if (empty($this->data)) {
            $this->message = "Arrival date is missing.";
            $this->isValid = false;
            return false;
        }
        if (!strtotime($this->data)) {
            $this->message = "Wrong arrival date format.";
            $this->isValid = false;
            return false;
        }
        // check if the date is in the past
        $this->message = "";
        $this->isValid = true;
        return true;
    }
}