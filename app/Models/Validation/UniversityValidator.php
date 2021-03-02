<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class UniversityValidator extends DataValidator
{
    public function validate()
    {
        // not empty
        // prvni velke pismeno
        return true;
    }
}