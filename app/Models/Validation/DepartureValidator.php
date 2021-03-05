<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;
use DateTime;

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
        if (!empty($this->data)) {
            if (!strtotime($this->data)) {
                return $this->result("Wrong departure date format.");
            }
            if ($this->data <= $this->arrival) {
                return $this->result("Departure is sooner than arrival.");
            }
        }
        return $this->result("");
    }
}