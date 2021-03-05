<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;
use DateTime;

class ArrivalValidator extends DataValidator
{
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Arrival date is missing.");
        }
        if (!strtotime($this->data)) {
            return $this->result("Wrong arrival date format.");
        }
        if (new DateTime($this->data) > date_add(new DateTime('NOW'), date_interval_create_from_date_string('6 months'))) {
            return $this->result("Arrival is in the future.");
        }
        return $this->result("");

    }

    public function getMonth()
    {
        $date = new DateTime($this->data);
        return $date->format('n');
    }

    public function getYear()
    {
        $date = new DateTime($this->data);
        return $date->format('Y');
    }
}