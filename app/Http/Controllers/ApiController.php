<?php

namespace App\Http\Controllers;

use App\Http\Resources\FieldResource;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function getFields(int $type, string $id)
    {
        $res = file_get_contents(
            "https://stag-ws.utb.cz/ws/services/rest2/programy/getStudijniProgramy?" .
                "fakulta=" . $id . "&outputFormat=JSON"
        );
        if ($res !== false && (strpos($res, "faultstring") !== false || substr($res, 0, 6) == '<html>')) {
            return response()->json(['fail']);
        }
        if ($res === false || strlen($res) == 0) {
            return response()->json(['fail']);
        }
        $res = json_decode($res, true);
        return $this->jsonResponse(FieldResource::collection($res['programInfo']));

    }
}
