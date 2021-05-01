<?php

namespace App\Models\Validation;

use App\Models\User;
use App\Models\Validation\DataValidator;
use Illuminate\Support\Facades\Hash;

class StudentValidator extends DataValidator
{
    /**
     * Data validator for the arrival
     * connected to the mobility.
     *
     * @var ArrivalValidator
     */
    public ArrivalValidator $arrival;

    /**
     * Data validator for the arrival
     * connected to the mobility.
     *
     * @var DepartureValidator
     */
    public DepartureValidator $departure;

    /**
     * Message to rewrite the previous.
     * 
     * @var string
     */
    public const REWRITE = "This mobility will rewrite previous one.";

    /**
     * Create new instance for DataValidator.
     *
     * @param string  $data
     * @param ArrivalValidator  $arrival
     * @param DepartureValidator  $departure
     */
    public function __construct($data, &$arrival, &$departure)
    {
        $this->data = $data;
        $this->arrival = $arrival;
        $this->departure = $departure;
    }

    /**
     * Validate the input data.
     *
     * @return bool
     */
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Student ID is missing.");
        }
        if (strlen($this->data) != 64) {
            if (!preg_match("/[A-Z]{2}[0-9]{6}/", $this->data)) {
                return $this->result("Wrong student ID format.");
            }
            $this->data = hash('sha256', $this->data);
        }
        if ($this->arrival->isValid && $this->departure->isValid) {
            if (!User::hasUniqueMobility($this->data, $this->arrival->data, $this->departure->data)) {
                return $this->result(self::REWRITE);
            }
        }
        return $this->result("");
    }
}