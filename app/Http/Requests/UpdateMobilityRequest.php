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
        return true; // signed user of the mobility
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
            'reason' => ['array', 'nullable'],
            'reason.*' => ['integer'],
            'new' => ['array', 'nullable'],
            'new.*' => ['string', 'nullable', 'alpha_num']
        ];
    }
}
