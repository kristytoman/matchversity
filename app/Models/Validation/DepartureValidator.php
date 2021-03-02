<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class DepartureValidator extends DataValidator
{
    protected $arrival;
    public function __construct($data, $arrival)
    {
        $this->data = $data;
        $this->arrival = $arrival;
    }

    public function validate()
    {
        if ($this->data <= $this->arrival) {
            $this->message = "Departure is sooner than arrival";
            $this->isValid = false;
            return false;
        }
        $this->message = "";
        $this->isValid = true;
        return true;
    }
}