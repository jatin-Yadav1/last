<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckEmailRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to false if authentication is required
    }

    public function rules()
    {
        return [
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('Email is required.'),
            'email.email' => __('Please enter a valid email address.')
        ];
    }
}
