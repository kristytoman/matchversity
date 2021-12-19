<?php

namespace App\Http\Resources;

class FieldResource
{
    /**
     * Transform the resource into an array.
     *
     * @param array $request
     * @return array
     */
    public static function toArray($request)
    {
        return [
            'id' => $request['oborIdno'],
            'title' => $request['nazev'],
            'lang' => $request['jazyk'],
            'from' => $request['platnyOd'],
            'type' => self::getType($request['typ']),
            'form' => $request['forma'] == 'Prezenční'
        ];
    }

    /**
     * Transform the resource into an array.
     *
     * @param array $request
     * @return array
     */
    public static function fromCourseToArray($request)
    {
        return [
            'id' => $request['oborIdno'],
            'year' => $request['doporucenyRocnik'],
            'is_summer' => $request['doporucenySemestr'] == 'LS',
            'compulsory' => $request['statutBloku'] === 'A'
        ];
    }

    /**
     * Get the type of degree of the field.
     *
     * @param string $type
     * @return int
     */
    public static function getType($type): int
    {
        return match ($type) {
            'Bakalářský' => 1,
            'Magisterský' => 2,
            'Navazující' => 3,
            default => 0,
        };
    }
}
