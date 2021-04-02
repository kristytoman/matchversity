<?php

namespace App\Http\Controllers;

use App\Http\Resources\FieldResource;
use App\Http\Resources\ProgramResource;
use App\Models\Country;
use App\Models\HomeCourse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApiController extends Controller
{
    /**
     * Fetch data from the third party API.
     * 
     * @param string  $path
     * @return array|null
     */
    private function getContents(string $path)
    {
        $res = file_get_contents($path);
        if ($res !== false && (strpos($res, "faultstring") !== false || substr($res, 0, 6) == '<html>')) {
            return null;
        }
        if ($res === false || strlen($res) == 0) {
            return null;
        }
        return json_decode($res, true);
    }

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
        $programs = json_decode($this->getPrograms($type, $id));
        $fields = [];
        foreach ($programs as $program) {
            if ($programfields = $this->getContents(
                    'https://stag-ws.utb.cz/ws/services/rest2/programy/getOboryStudijnihoProgramu?' .
                    "stprIdno=" . $program->id .
                    "&rok=" . Carbon::now()->year .
                    "&outputFormat=JSON"
                )) {
                foreach ($programfields['oborInfo'] as $programfield) {
                    if ($programfield['forma'] == "Prezenční") {
                        $fields['full'][] = $programfield;
                    }
                    else {
                        $fields['part'][] = $programfield;
                    }
                }
            }
        }
        return $this->jsonResponse($fields);
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
        if ($res = $this->getContents(
                "https://stag-ws.utb.cz/ws/services/rest2/predmety/getPredmetyByObor?".
                "oborIdno=" . $id . 
                "&outputFormat=JSON"
            )) {
            foreach ($res['predmetOboru'] as $course) {
                if ($course['doporucenyRocnik'] && $course['doporucenyRocnik'] >= $grade) {
                    $courses[$course['doporucenySemestr']][$course['katedra'].'/'.$course['zkratka']] = $course;
                }
            }
            return $this->jsonResponse($courses);
        }
        return $this->jsonResponse("");
    }

    public function getCountries(Request $request)
    {
        HomeCourse::setSession($request->all());
        return $this->jsonResponse(Country::getAvailable());
    }
}
