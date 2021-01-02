<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMobilityRequest extends FormRequest
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
        // TODO: save reasons to unlink into db
        // TODO: new connected to unlinked
        // TODO: keys are associated with mobility
        return [
            'rate' => ['array', 'nullable', 'required_without:unlinked'],
            'rate.*' => ['integer', 'between:0,5'],
            'unlinked' => ['array', 'nullable', 'required_without:rate'],
            'unlinked.*' => ['integer', 'between:0,6'],
            'new' => ['array', 'nullable'],
            'new.*' => ['string', 'alpha_num']
        ];
    }
}
