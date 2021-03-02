<?php

namespace App\Models\Validation;

use Illuminate\Database\Eloquent\Model;

abstract class DataValidator
{
    public $data;
    public $message;

    public function __construct($data)
    {
        $this->data = $data;
    }

    abstract public function validate();
}
