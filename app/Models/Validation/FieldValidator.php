<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class FieldValidator extends DataValidator
{
    public function validate()
    {
        // field is not in the database
        // field has different faculty
        $this->message = "";
        $this->isValid = true;
        return true;
    }
}