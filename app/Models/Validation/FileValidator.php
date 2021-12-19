<?php

namespace App\Models\Validation;

use App\Constants\ImportColumns;
use SimpleXLSX;

class FileValidator
{
    /**
     * The input data of the file to validate.
     *
     * @var array|null
     */
    public $data;

    /**
     * File to validate.
     *
     * @var Object
     */
    private $file;

    /**
     * The validated mobilities.
     *
     * @var array
     */
    public $validated;

    /**
     * The invalid mobilities to check.
     *
     * @var array
     */
    public $toCheck;

    /**
     * Returns the number of mobilities in the file.
     *
     * @return int
     */
    public function getCount()
    {
        return count($this->validated) + count($this->toCheck);
    }

    /**
     * Checks if the file has all needed rows.
     *
     * @param array $row
     * @return bool
     */
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

    /**
     * Parse the file content into array
     * @return void
     */
    private function parseData()
    {
        $this->data = null;
        if ($this->data = SimpleXLSX::parse($this->file)) {
            $header = $rows = [];
            foreach ($this->data->rows() as $index => $row) {
                if ($index === 0) {
                    if (!$this->isRightHeader($row)) {
                        $this->data = null;
                        return;
                    }
                    $header = $row;
                    continue;
                }
                $rows[] = array_combine($header, $row);
            }
            $this->data = $rows;
        }
    }

    /**
     * Returns validated data of the file.
     *
     * @param object $file
     * @return array|null
     */
    public function getData(object $file): ?array
    {
        $this->file = $file;
        HomeCourseValidator::refreshField();
        $this->parseData();
        if ($this->data) {
            $mobilities = [];
            foreach ($this->data as $row) {
                if (($row[ImportColumns::DEGREE] !== 'doktorský') &&
                    (!empty($row[ImportColumns::HOME_COURSE])) &&
                    !empty($row[ImportColumns::STUDENT_ID])) {
                    $this->addMobility($mobilities, $row);
                }
            }
            $this->validateMobilities($mobilities, false);
            HomeCourseValidator::refreshField();
            if (count($this->toCheck) < 20) {
                return $this->validated;
            }
        }
        return null;
    }

    /**
     * Add input row of the file to the array of mobilities.
     *
     * @param array $mobilities
     * @param array $data
     * @return void
     */
    private function addMobility(array &$mobilities, array $data)
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

    /**
     * Validate the data of the file.
     *
     * @param array $mobilities
     * @param bool $revalidate
     * @return void
     */
    private function validateMobilities(array &$mobilities, bool $revalidate)
    {
        $this->toCheck = [];
        $this->validated = [];
        foreach ($mobilities as $mobility) {
            if ($mobility->validate() ||
                ($mobility->student->message == StudentValidator::REWRITE && $revalidate)) {
                array_push($this->validated, $mobility);
            } else {
                array_push($this->toCheck, $mobility);
            }
        }
    }

    /**
     * Revalidate data from form.
     *
     * @param array $request
     * @return array
     */
    public function revalidate($request)
    {
        $mobilities = MobilityValidator::fromForm($request);
        $this->validateMobilities($mobilities, true);
        HomeCourseValidator::refreshField();
        return $this->validated;
    }
}
