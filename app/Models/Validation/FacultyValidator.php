<?php

namespace App\Models\Validation;

use App\Models\Faculty;
use App\Models\Validation\DataValidator;

class FacultyValidator extends DataValidator
{
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Empty home course faculty.");
        }
        if (!Faculty::getById($this->data)) {
            return $this->result("Unknown home course faculty.");
        }
        return $this->result("");
    }
}