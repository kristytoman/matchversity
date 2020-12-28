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
        // TODO: test rules
        // TODO: test unique web
        // TODO: test unique exchange
        // TODO: test unique homecourse in the mobility
        // TODO: test unique foreigncourse in the mobility
        return [
            'uniID' => ['nullable', 'exists:universities,ID'],
            'name' => ['nullable','required_without:uniID','max:100','unique:universities,name'],
            'originalName' => ['nullable','required_without:uniID','string','max:100'],
            'continent' => ['nullable','required_without:uniID','string', Rule::in(['Africa','Asia','Australia','Europe','North America','South America'])],
            'country' => ['nullable','required_without:uniID', 'string', new isCountry($this->request->all()) ],
            'city' => ['nullable','required_without:uniID','string', 'max:80'],
            'web' => ['nullable','required_without:uniID', 'string', 'url','unique:universities,web'],
            'xchange' => ['nullable','required_without:uniID','string','url','unique:universities,xchange'],
            'expiration' => ['nullable','required_without:uniID', 'date_format:Y-m'],
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
