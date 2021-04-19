<?php

namespace App\Http\Resources;

class CourseResource 
{
    /**
     * Transform the resource into an array.
     *
     * @param  array  $request
     * @return array
     */
    public static function fromCollectionToArray($request)
    {
        return [
            'unit' => $request['katedra'],
            'code' => $request['zkratka']
        ];
    }
}
