<?php

namespace App\Http\Resources;

class FieldResource 
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
            'id' => $request['oborIdno'],
            'title' => $request['nazev'],
            'lang' => $request['jazyk'],
            'from' => $request['platnyOd'],
            'type' =>  self::getType($request['typ']),
            'form' => $request['forma'] == 'Prezenční'
        ];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  array  $request
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
     * @param  string  $type
     * @return array
     */
    public static function getType($type)
    {
        switch ($type) {
            case 'Bakalářský':
                return 1;
            case 'Magisterský':
                return 2;
            case 'Navazující':
                return 3;
            default:
                return 0;
        }
    }
}
