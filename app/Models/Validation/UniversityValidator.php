<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class UniversityValidator extends DataValidator
{
    /**
     * Validate the input data.
     *
     * @return bool
     */
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Missing university name.");
        }
        return $this->result("");
    }
}