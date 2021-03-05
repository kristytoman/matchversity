<?php

namespace App\Models\Validation;

use App\Models\Field;
use App\Models\Validation\DataValidator;

class FieldValidator extends DataValidator
{
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Course is missing field.");
        }
        return $this->result("");
    }
}