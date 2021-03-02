<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class YearValidator extends DataValidator
{
    public function validate()
    {
        // rok
        // je v rozmezi +-1 od arrival
        // pokud je semestr LS pak pridat 1 rok
        return true;
    }
}