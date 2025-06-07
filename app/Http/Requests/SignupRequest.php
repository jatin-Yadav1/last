<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // User Table Fields
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => [
                'required',
                'string',
                'min:3',
                'max:30',
                'regex:/^[a-zA-Z][a-zA-Z0-9._]*$/',
                'unique:users,username',
            ],
            // 'number' => 'required|string|unique:users,number',
            'password' => 'required|string|min:8',
            'referral_code' => [
                'nullable',
                'string',
                'exists:users,referral_code',
            ],
            'terms' => 'accepted',
            
            // 'category_id' => 'required|string|max:255', // optional if needed
            // 'hobbies' => 'required|array|min:1',
            // 'hobbies.*' => 'string|max:255',
            
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already taken.',

            'number.required' => 'Phone number is required.',
            'number.unique' => 'This phone number is already registered.',


            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',

            'profile.first_name.required' => 'First name is required.',
            'profile.first_name.max' => 'First name should not exceed 255 characters.',
            'profile.last_name.max' => 'Last name should not exceed 255 characters.',
            'profile.gender.required' => 'Gender is required.',
            'profile.gender.in' => 'Gender must be male, female, or other.',
            'profile.dob.required' => 'Date of birth is required.',
            'profile.dob.date' => 'Date of birth must be a valid date.',
            'profile.dob.before' => 'Date of birth must be a date before today.',

            'hobbies.required' => 'Please select at least one hobby.',
            'hobbies.array' => 'Hobbies must be an array.',
            'hobbies.*.string' => 'Each hobby must be a valid string.',
            'category_id.required' => 'Category Id is required.',

        ];
    }
}
