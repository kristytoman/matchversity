<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class DegreeValidator extends DataValidator
{
    /**
     * Data input for the study field
     * connected to the mobility.
     *
     * @var string
     */
    protected $field;

    /**
     * Create a new instance for DegreeValidator.
     *
     * @param string  $data
     * @param string  $field
     */
    public function __construct($data, $field)
    {
        $this->data = $data;
        $this->field = $field;
    }

    /**
     * Validate the input data.
     *
     * @return bool
     */
    public function validate()
    {
        if (($this->data !== "bakalářský") &&
            ($this->data !== "navazující") &&
            ($this->data !== "doktorský")) {
                return $this->result("Not supported degree. Accepting only " .
                    "'bakalářský' or 'navazující' or 'doktorský'.");
        }
        return $this->result("");
    }
}