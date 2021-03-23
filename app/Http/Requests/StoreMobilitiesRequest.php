<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMobilitiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mobility' => ['required', 'array', 'min:1'],
            'mobility.*' => ['required', 'array', 'size:8'],
            'mobility.*.student' => ['required', 'string', 'size:64', 'alpha_num'],
            'mobility.*.university' => ['required', 'string', 'max:128'],
            'mobility.*.city' => ['required', 'string', 'max:128'],
            'mobility.*.arrival' => ['required', 'date'],
            'mobility.*.departure' => ['nullable', 'date'],
            'mobility.*.semester' => ['required', 'string'],
            'mobility.*.year' => ['required', 'date_format:Y'],
            'mobility.*.pairing' => ['required', 'array', 'min:1'],
            'mobility.*.pairing.*.type' => ['required', 'string', 'alpha'],
            'mobility.*.pairing.*.foreignCourse' => ['required', 'string'],
            'mobility.*.pairing.*.homeCourse' => ['required', 'array', 'size:3'],
            'mobility.*.pairing.*.homeCourse.code' => ['required', 'string', 'regex:/^[A-Z0-9]*\/[A-Z0-9]*$/'],
            'mobility.*.pairing.*.homeCourse.name_cz' => ['required', 'string'],
            'mobility.*.pairing.*.homeCourse.name_en' => ['required', 'string']
        ];
    }
}
