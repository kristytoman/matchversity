<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class HomeCourseValidator extends DataValidator
{
    public function validate()
    {
        // nesmí být prázdný
        // obsahuje text/text
        return true;
    }
}