<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class HomeCourseValidator extends DataValidator
{
    public $name;
    public $year;

    public function __construct($course, $year)
    {
        $this->data = $course;
        $this->year = $year;
    }

    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Missing home course code.");
        }
        if (!preg_match("/^[A-Z0-9]*\/[A-Z0-9]*$/", $this->data)) {
            return $this->result("Wrong home course code format.");
        }
        if (!$this->getName()) {
            return $this->result("Name import not succesful.");
        }
        return $this->result("");
    }


    public function getName()
    {
        $code = explode("/", $this->data);
        $res = file_get_contents('https://stag-ws.utb.cz/ws/services/rest2/predmety/getPredmetInfo?katedra='.$code[0].
        '&zkratka='.$code[1].'&rok='.$this->year->data.'&outputFormat=JSON');
        if ($res !== false && (strpos($res, "faultstring") !== false || substr($res, 0, 6) == '<html>')) {
            return false;
        }
        if ($res === false || strlen($res) == 0) {
            return false;
        }
        $this->name = json_decode($res)->nazev;
        return true;
    }
}