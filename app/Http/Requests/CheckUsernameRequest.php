<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckUsernameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => [
                'required',
                'string',
                'min:3', // Minimum length 4 (like Twitter)
                'max:30', // Maximum length 30 (like Instagram)
                'regex:/^[a-zA-Z0-9_]+$/', // Only allow letters, numbers, and underscores
                // 'unique:users,username', // Ensure username is unique in the users table
            ]
        ];
    }

    public function messages()
    {
        return [
            'username.required' => __('Username is required.'),
            'username.min' => __('Username must be at least 4 characters long.'),
            'username.max' => __('Username cannot exceed 30 characters.'),
            'username.regex' => __('Username can only contain letters, numbers, and underscores.'),
            // 'username.unique' => __('This username is already taken. Try another one.')
        ];
    }
}
