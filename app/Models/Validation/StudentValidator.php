<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class StudentValidator extends DataValidator
{
    public function validate()
    {
        if (empty($this->data)) {
            $this->message = "Student ID is missing.";
            $this->isValid = false;
            return false;
        }
        if (preg_match("/[A-Z]{2}[0-9]{6}/", $this->data)) {
            $this->message = "Wrong student ID format.";
            $this->isValid = false;
            return false;
        }
        // hash data
        $this->message = "";
        $this->isValid = true;
        return true;
    }
}