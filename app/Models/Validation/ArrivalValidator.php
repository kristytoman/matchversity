<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;
use DateTime;

class ArrivalValidator extends DataValidator
{
    /**
     * Get the month of the arrival.
     *
     * @return int
     */
    public function getMonth()
    {
        $date = new DateTime($this->data);
        return $date->format('n');
    }

    /**
     * Get the year of the arrival.
     *
     * @return int
     */
    public function getYear()
    {
        $date = new DateTime($this->data);
        return $date->format('Y');
    }

    /**
     * Validate the input data.
     *
     * @return bool
     */
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Arrival date is missing.");
        }
        if (!strtotime($this->data)) {
            return $this->result("Wrong arrival date format.");
        }
        return $this->result("");
    }
}