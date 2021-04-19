<?php

namespace App\Http\Resources;

class FieldCourseCollection
{
    /**
     * Transform the resource array into an array of field courses.
     *
     * @param  array $request
     * @return array
     */
    public static function toArray($request)
    {
        $collection = [];
        foreach ($request['oborPredmetu'] as $course) {
            $collection[] = FieldResource::fromCourseToArray($course);
        }
        return $collection;
    }
}
