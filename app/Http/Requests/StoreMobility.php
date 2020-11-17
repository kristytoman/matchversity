<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\isCountry;

class StoreMobility extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: Only signed user
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // TODO: add regex to string
        // TODO: required at least one pairing
        return [
            'uniID' => ['nullable', 'exists:universities,ID'],
            'name' => ['required_without:uniID','max:100','unique:universities,name'],
            'originalName' => ['required_without:uniID','string','max:100'],
            'continent' => ['required_without:uniID','string', Rule::in(['Africa','Asia','Australia','Europe','North America','South America'])],
            'country' => ['required_without:uniID', 'string', new isCountry($this->request->all()) ],
            'city' => ['required_without:uniID','string', 'max:80'],
            'web' => ['required_without:uniID', 'string', 'url','unique:universities,web'],
            'xchange' => ['required_without:uniID','string','url','unique:universities,xchange'],
            'expiration' => ['required_without:uniID', 'date_format:Y-m'],
            'semester' => ['required','array','min:1'],
            'semester.*' => ['date_format:Y'], 
            'pairing' => ['required','array','min:1'],
            'pairing[winter]' => ['required_with:semester[winter]','array','min:2'],
            'pairing[summer]' => ['required_with:semester[summer]','array','min:2'],
            'pairing.summer.*.foreignCode' => ['required_with:pairing[summer]','string','max:10','alpha_num'],
            'pairing.winter.*.foreignCode' => ['required_with:pairing[winter]','string','max:10','alpha_num'],
            'pairing.*.*.foreignName' => ['required_with:pairing.*.*.foreignCode','string','max:100'],
            'pairing.*.*.homeCode' => ['required_with:pairing.*.*.foreignCode','string','max:10','alpha_num'],
            'pairing.*.*.homeName' => ['required_with:pairing.*.*.homeName','string','max:100']
        ];
    }
}
