<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class DegreeValidator extends DataValidator
{
    public function validate()
    {
        // is the same as in the saved field
        // if field doesn't exists then has value "bakalarsky" or "magistersky"
        $this->isValid = true;
        return true;
    }
}