<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get JSON respons in UTF-8 encoding.
     * 
     * @param array  $data
     * @param int  $code
     * @return Illuminate\Http\Response
     */
    protected function jsonResponse($data, $code = 200)
    {
        return response()->json($data, $code, [
                'Content-Type' => 'application/json;charset=UTF-8', 
                'Charset' => 'utf-8'
            ], JSON_UNESCAPED_UNICODE
        );
    }
}
