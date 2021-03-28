<?php

namespace App\Models\Validation;

use App\Models\Field;
use App\Models\Validation\DataValidator;

class FieldValidator extends DataValidator
{
    /**
     * Validate the input data.
     *
     * @return bool
     */
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Course is missing field.");
        }
        return $this->result("");
    }
}