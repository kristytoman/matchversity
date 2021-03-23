<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;
use App\Models\HomeCourse;

class HomeCourseValidator extends DataValidator
{
    public $nameCZ;
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
        $new->nameCZ = $homeCourse['name_cz'];
        $new->nameEN = $homeCourse['name_en'];
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
        if ($this->nameCZ && $this->nameEN) {
            return true;
        }
        // if ($savedCourse = HomeCourse::findByCode($this->data)) {
        //     $this->nameCZ = $savedCourse->name_cz;
        //     return true;
        // }
        if (!empty(self::$courses) && key_exists($this->data . $year, self::$courses)) {
            $this->nameCZ = self::$courses[$this->data . $year]['cz'];
            $this->nameEN = self::$courses[$this->data . $year]['en'];
            return true;
        }
        $code = explode("/", $this->data);
        if ($this->nameCZ = $this->fetchName($code[0], $code[1], $year, 'cs')) {
            self::$courses[$this->data . $year]['cz'] = $this->nameCZ;
            if ($this->nameEN = $this->fetchName($code[0], $code[1], $year, 'en')) {
                self::$courses[$this->data . $year]['en'] = $this->nameEN;
                return true;
            }
            else {
                return false;
            }
        }
        return false;
    }

    public function fetchName($unit, $course, $year, $lang)
    {
        $res = file_get_contents('https://stag-ws.utb.cz/ws/services/rest2/predmety/getPredmetInfo?katedra='.$unit.
        '&zkratka='.$course.'&rok='.$year.'&lang='.$lang.'&outputFormat=JSON');
        if ($res !== false && (strpos($res, "faultstring") !== false || substr($res, 0, 6) == '<html>')) {
            return null;
        }
        if ($res === false || strlen($res) == 0) {
            return null;
        }
        return json_decode($res)->nazevDlouhy;
    }
}