<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;
use App\Models\HomeCourse;

class HomeCourseValidator extends DataValidator
{
    public $name;
    public $year;
    private static $courses;


    public function __construct()
    {

    }

    public static function fromFile($course, $year)
    {
        $new = new HomeCourseValidator;
        $new->data = $course;
        $new->year = $year;
        return $new;
    }

    public static function fromForm($homeCourse)
    {
        $new = new HomeCourseValidator;
        $new->data = $homeCourse['code'];
        $new->name = $homeCourse['name'];
        return $new;
    }

    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Missing home course code.");
        }
        if (!preg_match("/^[A-Z0-9]*\/[A-Z0-9]*$/", $this->data)) {
            return $this->result("Wrong home course code format.");
        }
        if (!$this->getName($this->year->data) && !$this->getName($this->year->data-1)) {
            return $this->result("Name import not succesful.");
        }
        return $this->result("");
    }

    public static function refreshField()
    {
        self::$courses = [];
    }

    public function getName($year)
    {
        if ($this->name) {
            return true;
        }
        // if ($savedCourse = HomeCourse::find($this->data)) {
        //     $this->name = $savedCourse->name;
        //     return true;
        // }
        if (!empty(self::$courses) && key_exists($this->data . $year, self::$courses)) {
            $this->name = self::$courses[$this->data . $year];
            return true;
        }
        $code = explode("/", $this->data);
        if ($this->name = $this->fetchName($code[0], $code[1], $year)) {
            self::$courses[$this->data . $year] = $this->name;
            return true;
        }
        return false;
    }

    public function fetchName($unit, $course, $year)
    {
        $res = file_get_contents('https://stag-ws.utb.cz/ws/services/rest2/predmety/getPredmetInfo?katedra='.$unit.
        '&zkratka='.$course.'&rok='.$year.'&outputFormat=JSON');
        if ($res !== false && (strpos($res, "faultstring") !== false || substr($res, 0, 6) == '<html>')) {
            return null;
        }
        if ($res === false || strlen($res) == 0) {
            return null;
        }
        return json_decode($res)->nazevDlouhy;
    }
}