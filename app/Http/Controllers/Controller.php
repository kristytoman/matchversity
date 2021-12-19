<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get JSON respons in UTF-8 encoding.
     *
     * @param array|Collection|Model $data
     * @param int $code
     * @return JsonResponse
     */
    protected function jsonResponse($data, int $code = 200): JsonResponse
    {
        return response()->json($data, $code, [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Charset' => 'utf-8'
        ], JSON_UNESCAPED_UNICODE
        );
    }
}
