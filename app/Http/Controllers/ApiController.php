<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\HomeCourse;
use App\Models\Field;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Get array of program's fields.
     * 
     * @param int  $type
     * @param string  $id
     * @return Illuminate\Http\Response
     */
    public function getFields(int $type, string $id)
    {
        return $this->jsonResponse(Field::getByFaculty($id, $type));
    }

    /**
     * Get array of field's courses.
     * 
     * @param int  $id
     * @param int  $grade
     * @return Illuminate\Http\Response
     */
    public function getCourses(int $id, int $grade)
    {
        return $this->jsonResponse(Field::getCourses($id, $grade));
    }

    /**
     * Get array of available countries.
     * 
     * @param Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function getCountries(Request $request)
    {
        HomeCourse::setSession($request->all());
        return $this->jsonResponse(Country::getAvailable());
    }

    /**
     * Get a course by its code.
     * 
     * @param string $unit
     * @param string $code
     * @return Illuminate\Http\Response
     */
    public function getCourse($unit, $code)
    {
        return $this->jsonResponse(HomeCourse::findByCode($unit . '/' . $code));
    }
}
