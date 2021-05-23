<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class VerifyReasonRequest extends FormRequest
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
            'description_cz' => ['required_without:connect', 'nullable', 'string'],
            'description_en' => ['required_without:connect', 'nullable', 'string'],
            'connect' => ['required_without:description_cz', 'nullable', 'numeric', 'exists:reasons,id']
        ];
    }
}
