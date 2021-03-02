<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class SemesterValidator extends DataValidator
{
    public function validate() 
    {
        // je ZS nebo LS
        // pokud je ZS tak arrival je 8 - 11
        // pokud je LS tak arrival je 12 - 5
        return true;
    }
}