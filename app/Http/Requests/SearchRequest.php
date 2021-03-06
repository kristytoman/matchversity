<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'countries' => ['nullable', 'array'],
            'countires.*' => ['alpha', 'size:2', 'string', 'exists:countries,id'],
            'courses' => ['nullable', 'array'],
            'courses.*' => ['string', 'exists:home_courses,code']
        ];
    }
}
