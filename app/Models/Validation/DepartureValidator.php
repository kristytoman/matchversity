<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;
use DateTime;

class DepartureValidator extends DataValidator
{
    /**
     * Data input for the arrival
     * connected to the mobility.
     *
     * @var string
     */
    protected $arrival;

    /**
     * Create a new instance for DepartureValidator.
     *
     * @param string  $data
     * @param string  $arrival
     */
    public function __construct($data, $arrival)
    {
        $this->data = $data;
        $this->arrival = $arrival;
    }

    /**
     * Validate the input data.
     *
     * @return bool
     */
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