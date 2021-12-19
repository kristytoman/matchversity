<?php

namespace App\Models\Validation;

abstract class DataValidator
{
    /**
     * The input data to validate.
     *
     * @var string|null
     */
    public $data;

    /**
     * Error message when the data is invalid.
     *
     * @var string
     */
    public $message;

    /**
     * Validation result.
     *
     * @var bool
     */
    public $isValid;

    /**
     * Create new instance for DataValidator.
     *
     * @param string|null $data
     */
    public function __construct($data = null)
    {
        if (isset($data)) {
            $this->data = $data;
        }
    }

    /**
     * Abstract method to validate the data.
     * @return bool
     */
    abstract public function validate();

    /**
     * Set the error message of the input data.
     *
     * @param string $message
     * @return bool
     */
    public function result($message)
    {
        $this->message = $message;
        $this->isValid = empty($message);
        return $this->isValid;
    }
}
