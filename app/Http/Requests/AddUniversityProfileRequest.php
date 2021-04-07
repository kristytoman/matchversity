<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AddUniversityProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required_without:connect_university', 'nullable', 'string'],
            'native_name' => ['required_without:connect_university', 'nullable', 'string'],
            'country' => ['required_without:connect_university', 'nullable', 'string'],
            'city' => ['required_without:connect_university', 'nullable', 'string'],
            'web' => ['required_without:connect_university', 'nullable', 'string'],
            'xchange' => ['required_without:connect_university', 'nullable', 'numeric'],
            'xchange_link' => ['required_without:connect_university', 'nullable', 'string'],
            'connect_university' => ['required_without:name', 'nullable', 'numeric']
        ];
    }
}
