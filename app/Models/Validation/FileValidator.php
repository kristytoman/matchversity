<?php

namespace App\Models\Validation;

use ImportColumns;
use App\Models\Validation\HomeCourseValidator;
use SimpleXLSX;

class FileValidator
{
    public $data;

    private $file;

    public $validated;

    public $toCheck;

    public function getCount()
    {
        return count($this->validated) + count($this->toCheck);
    }
    private function isRightHeader($row)
    {
        return in_array(ImportColumns::STUDENT_ID, $row) &&
            in_array(ImportColumns::FACULTY, $row) &&
            in_array(ImportColumns::YEAR, $row) &&
            in_array(ImportColumns::SEMESTER, $row) &&
            in_array(ImportColumns::DEGREE, $row) &&
            in_array(ImportColumns::START, $row) &&
            in_array(ImportColumns::END, $row) &&
            in_array(ImportColumns::UNIVERSITY, $row) &&
            in_array(ImportColumns::CITY, $row) &&
            in_array(ImportColumns::FIELD, $row) &&
            in_array(ImportColumns::FOREIGN_COURSE, $row) &&
            in_array(ImportColumns::HOME_COURSE, $row) &&
            in_array(ImportColumns::PAIRING_TYPE, $row);
    }

    private function createHeader($row)
    {
        if ($this->isRightHeader($row)) {
            return $row;
        }
        return null;
    }

    private function parseData()
    {
        $this->data = null;
        if ($this->data = SimpleXLSX::parse($this->file)) {
            $header = $rows = [];
            foreach ($this->data->rows() as $index => $row) {
                if ($index === 0) {
                    if (!$header = $this->createHeader($row)) {
                        return;
                    }
                    continue;
                }
                $rows[] = array_combine($header, $row);
            }
            $this->data = $rows;
        }
    }

    public function getData($file)
    {
        $this->file = $file;
        HomeCourseValidator::refreshField();
        $this->parseData();
        if ($this->data) {
            $mobilities = [];
            foreach ($this->data as $row) {
                if (($row[ImportColumns::DEGREE] !== 'doktorský') && (!empty($row[ImportColumns::HOME_COURSE])) &&
                !empty($row[ImportColumns::STUDENT_ID])) {
                    $this->addMobility($mobilities, $row);
                }
            }
            $this->validateMobilities($mobilities);
            HomeCourseValidator::refreshField();
            return $this->validated;
        }
        return null;
    }

    private function addMobility(&$mobilities, $data)
    {
        foreach ($mobilities as $mobility) {
            if ($mobility->student->data === $data[ImportColumns::STUDENT_ID] &&
                $mobility->arrival->data === $data[ImportColumns::START] &&
                $mobility->departure->data === $data[ImportColumns::END]) {
                    $mobility->addPairing($data);
                    return;
            }
        }
        array_push($mobilities, MobilityValidator::fromFile($data));
    }

    public function validateMobilities(&$mobilities)
    {
        $this->toCheck = [];
        $this->validated = [];
        foreach($mobilities as $mobility) {
            if ($mobility->validate()) {
                array_push($this->validated, $mobility);
            }
            else {
                array_push($this->toCheck, $mobility);
            }
        }
    }

}