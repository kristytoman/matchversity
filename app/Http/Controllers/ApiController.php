<?php

namespace App\Http\Controllers;

use App\Http\Resources\FieldResource;
use App\Http\Resources\ProgramResource;
use App\Models\Country;
use App\Models\HomeCourse;
use App\Models\Field;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApiController extends Controller
{

    /**
     * Get array of university's study programs.
     * 
     * @param int  $type
     * @param string  $id
     * @return string|null
     */
    public function getPrograms(int $type, string $id)
    {
        if ($res = $this->getContents(
                "https://stag-ws.utb.cz/ws/services/rest2/programy/getStudijniProgramy?" .
                "fakulta=" . $id . 
                "&typ=" . $type .
                "&outputFormat=JSON"
            )) {
                return json_encode(
                    ProgramResource::collection($res['programInfo']), 
                    JSON_UNESCAPED_UNICODE
                );
        }
        else return null;
    }

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

    public function getCountries(Request $request)
    {
        HomeCourse::setSession($request->all());
        return $this->jsonResponse(Country::getAvailable());
    }

    public function getCountriesFake($course1, $course2)
    {
        HomeCourse::setSession(['courses'=> ['AUIUI'.$course1,'AUIUI'.$course2]]);
        return $this->jsonResponse(Country::getAvailable());
    }

    public function getCourse($unit, $code)
    {
        return $this->jsonResponse(HomeCourse::findByCode($unit . '/' . $code));
    }
}
