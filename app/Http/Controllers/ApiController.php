<?php

namespace App\Http\Controllers;

use App\Http\Resources\FieldResource;
use App\Http\Resources\ProgramResource;
use Illuminate\Http\Request;
use Carbon\Carbon;



class ApiController extends Controller
{
    public function getPrograms(int $type, string $id)
    {
        $res = file_get_contents(
            "https://stag-ws.utb.cz/ws/services/rest2/programy/getStudijniProgramy?" .
            "fakulta=" . $id . 
            "&typ=" . $type .
            "&outputFormat=JSON"
        );
        if ($res !== false && (strpos($res, "faultstring") !== false || substr($res, 0, 6) == '<html>')) {
            return response()->json(['fail']);
        }
        if ($res === false || strlen($res) == 0) {
            return response()->json(['fail']);
        }
        $res = json_decode($res, true);
        return json_encode(ProgramResource::collection($res['programInfo']), JSON_UNESCAPED_UNICODE);
    }

    public function getFields(int $type, string $id)
    {
        $programs = json_decode($this->getPrograms($type, $id));
        $fields = [];
        foreach ($programs as $program) {
            $res = file_get_contents(
                'https://stag-ws.utb.cz/ws/services/rest2/programy/getOboryStudijnihoProgramu?' .
                "stprIdno=" . $program->id .
                "&rok=" . Carbon::now()->year .
                "&outputFormat=JSON"
            );
            if ($res !== false && (strpos($res, "faultstring") !== false || substr($res, 0, 6) == '<html>')) {
                return response()->json('fail');
            }
            if ($res === false || strlen($res) == 0) {
                return response()->json('fail');
            }
            $programfields = json_decode($res, true);
            foreach ($programfields['oborInfo'] as $programfield) {
                if ($programfield['forma']=="Prezenční") {
                    $fields['full'][]=$programfield;
                }
                else {
                    $fields['part'][]=$programfield;
                }
            }
        }
        return $this->jsonResponse($fields);
    }
}
