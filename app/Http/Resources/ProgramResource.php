<?php

namespace App\Http\Resources;

class ProgramResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  array  $request
     * @return array
     */
    public static function toArray($request)
    {
        return [
            'id' => $request['stprIdno'],
        ];
    }
}