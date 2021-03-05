<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class DegreeValidator extends DataValidator
{
    public $field;
    public function __construct($data, $field)
    {
        $this->data = $data;
        $this->field = $field;
    }

    public function validate()
    {
        if (($this->data !== "bakalářský") && ($this->data !== "navazující") && ($this->data !== "doktorský")) {
            return $this->result("Not supported degree. Accepting only 'bakalářský' or 'navazující' or 'doktorský'.");
        }
        return $this->result("");
    }
}