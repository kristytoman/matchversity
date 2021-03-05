<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class StudentValidator extends DataValidator
{
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Student ID is missing.");
        }
        if (!preg_match("/[A-Z]{2}[0-9]{6}/", $this->data)) {
            return $this->result("Wrong student ID format.");
        }
        $this->data = hash("sha256", $this->data, false);
        return $this->result("");
    }
}