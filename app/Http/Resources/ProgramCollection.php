<?php

namespace App\Http\Resources;

class ProgramCollection
{
    /**
     * Transform the resource array into an array of programs.
     *
     * @param  array  $request
     * @return array
     */
    public static function toArray($request)
    {
        $collection = [];
        foreach ($request['programInfo'] as $program) {
            $collection[] = ProgramResource::toArray($program);
        }
        return $collection;
    }
}
