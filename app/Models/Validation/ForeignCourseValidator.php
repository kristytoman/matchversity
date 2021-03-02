<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class ForeignCourseValidator extends DataValidator
{
    public function validate()
    {
        // nesmí být prázdný
        // upravit na první velké písmeno
        return true;
    }
}