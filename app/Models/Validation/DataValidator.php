<?php

namespace App\Models\Validation;

use Illuminate\Database\Eloquent\Model;

abstract class DataValidator
{
    public $data;
    public $message;
    public $isValid;

    public function __construct($data)
    {
        $this->data = $data;
    }

    abstract public function validate();

    public function result($message)
    {
        $this->message = $message;
        $this->isValid = empty($message);
        return empty($message);
    }
}
