<?php

namespace App\Http\Resources;

class FieldCollection
{
    /**
     * Transform the resource array into an array of fields.
     *
     * @param  array  $request
     * @return array
     */
    public static function toArray($request)
    {
        $collection = [];
        foreach ($request['oborInfo'] as $field) {
            if (FieldResource::getType($field['typ']) != 0) {
                $collection[] = FieldResource::toArray($field);
            }
        }
        return $collection;
    }
}
