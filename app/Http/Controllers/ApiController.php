<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\HomeCourse;
use App\Models\Field;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Get array of program's fields.
     *
     * @param int $type
     * @param string $id
     * @return JsonResponse
     */
    public function getFields(int $type, string $id): JsonResponse
    {
        return $this->jsonResponse(Field::getByFaculty($id, $type));
    }

    /**
     * Get array of field's courses.
     *
     * @param int $id
     * @param int $grade
     * @return JsonResponse
     */
    public function getCourses(int $id, int $grade): JsonResponse
    {
        return $this->jsonResponse(Field::getCourses($id, $grade));
    }

    /**
     * Get array of available countries.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getCountries(Request $request): JsonResponse
    {
        HomeCourse::setSession($request->all());
        return $this->jsonResponse(Country::getAvailable());
    }

    /**
     * Get a course by its code.
     *
     * @param string $unit
     * @param string $code
     * @return JsonResponse
     */
    public function getCourse(string $unit, string $code): JsonResponse
    {
        return $this->jsonResponse(HomeCourse::findByCode($unit . '/' . $code) ?? []);
    }
}
