<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class FacultyValidator extends DataValidator
{
    public function validate()
    {
        // Faculty is not in the database

        $this->message = "";
        $this->isValid = true;
        return true;
    }
}