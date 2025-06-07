<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class CheckPhoneRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => ['required', new PhoneNumber($this->country)], // Validate phone with country code
            'country' => 'required|string|size:2', // Ensure country is provided (ISO-3166-1 alpha-2)
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => __('Phone number is required.'),
            'country.required' => __('Country code is required.'),
            'country.size' => __('Invalid country code format.'),
        ];
    }
}
