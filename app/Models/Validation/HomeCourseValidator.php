<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class HomeCourseValidator extends DataValidator
{
    /**
     * The Czech name of the course from STAG.
     *
     * @var string
     */
    public $nameCZ;

    /**
     * The English name of the course from STAG.
     *
     * @var string
     */
    public $nameEN;

    /**
     * The input data of the file.
     *
     * @var YearValidator
     */
    public $year;

    /**
     * The course names of the previous input data.
     *
     * @var string
     */
    private static $courses;

    /**
     * Create instance of HomeCourseValidator.
     *
     */
    public function __construct() { }

    /**
     * Initialize validator from file input.
     *
     * @param string  $course
     * @param YearValidator  $year
     * @return HomeCourseValidator
     */
    public static function fromFile($course, $year)
    {
        $new = new HomeCourseValidator;
        $new->data = $course;
        $new->year = $year;
        return $new;
    }

    /**
     * Initialize validator from file input.
     *
     * @param string  $homeCourse
     * @return HomeCourseValidator
     */
    public static function fromForm($homeCourse)
    {
        $new = new HomeCourseValidator;
        $new->data = $homeCourse['code'];
        $new->nameCZ = $homeCourse['name_cz'];
        $new->nameEN = $homeCourse['name_en'];
        return $new;
    }

    /**
     * Validate the input data.
     *
     * @return bool
     */
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Missing home course code.");
        }
        if (!preg_match("/^[A-Z0-9]*\/[A-Z0-9]*$/", $this->data)) {
            return $this->result("Wrong home course code format.");
        }
        if (!$this->getNames($this->year->data) && !$this->getNames($this->year->data - 1)) {
            return $this->result("Name import not succesful.");
        }
        return $this->result("");
    }

    /**
     * Set the course field empty.
     *
     */
    public static function refreshField()
    {
        self::$courses = [];
    }

    /**
     * Check if the names are already set.
     *
     * @return bool
     */
    private function isSet()
    {
        if ($this->nameCZ && $this->nameEN) {
            return true;
        }
        return false;
    }

    /**
     * Try to find the name in the previous data.
     *
     * @param int  $year
     * @return bool
     */
    private function findInPrevious($year)
    {
        if (!empty(self::$courses) && key_exists($index = $this->data . $year, self::$courses)) {
            if(key_exists('cz', self::$courses[$index]) && key_exists('en', self::$courses[$index])) {
                $this->nameCZ = self::$courses[$index]['cz'];
                $this->nameEN = self::$courses[$index]['en'];
                return true;
            }
        }
        return false;
    }

    /**
     * Get the names of the course.
     *
     * @param int  $year
     * @return bool
     */
    private function getNames($year)
    {
        if ($this->isSet() || $this->findInPrevious($year)) {
            return true;
        }

        $code = explode("/", $this->data);
        if ($this->getCzechName($code, $year) && $this->getEnglishName($code, $year)) {
            return true;
        }
        return false;
    }

    /**
     * Get the Czech name of the course.
     *
     * @param array  $code
     * @param int  $year
     * @return bool
     */
    public function getCzechName($code, $year)
    {
        if ($this->nameCZ = $this->fetchName($code[0], $code[1], $year, 'cs')) {
            self::$courses[$this->data . $year]['cz'] = $this->nameCZ;
            return true;
        }
        return false;
    }

    /**
     * Get the English name of the course.
     *
     * @param array  $code
     * @param int  $year
     * @return bool
     */
    public function getEnglishName($code, $year)
    {
        if ($this->nameEN = $this->fetchName($code[0], $code[1], $year, 'en')) {
            self::$courses[$this->data . $year]['en'] = $this->nameEN;
            return true;
        }
        self::$courses[$this->data . $year]['en'] = null;
        return false;
    }

    /**
     * Fetch the name from STAG.
     *
     * @param string  $unit
     * @param string  $course
     * @param int  $year
     * @param string  $lang
     * @return string
     */
    public function fetchName($unit, $course, $year, $lang)
    {
        $res = file_get_contents(
            'https://stag-ws.utb.cz/ws/services/rest2/predmety/getPredmetInfo?' .
            'katedra=' . $unit .
            '&zkratka=' . $course .
            '&rok=' . $year .
            '&lang=' . $lang .
            '&outputFormat=JSON'
        );
        if ($res !== false && (strpos($res, "faultstring") !== false || substr($res, 0, 6) == '<html>')) {
            return null;
        }
        if ($res === false || strlen($res) == 0) {
            return null;
        }
        return json_decode($res)->nazevDlouhy;
    }
}