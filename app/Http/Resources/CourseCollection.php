<?php

namespace App\Http\Resources;

class CourseCollection
{
    /**
     * Transform the resource array into an array of courses.
     *
     * @param  array  $request
     * @return array
     */
    public static function toArray($request)
    {
        $collection = [];
        foreach ($request['predmetOboru'] as $course) {
            $collection[] = CourseResource::fromCollectionToArray($course);
        }
        return $collection;
    }
}
