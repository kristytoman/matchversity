<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Mobility;

class UpdateMobilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $mobility = Mobility::find($this->route('mobility'));
         return $mobility->user_id === $this->user()->id;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
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
