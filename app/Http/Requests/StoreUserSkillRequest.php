<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserSkillRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    { 
        return [
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
            'status' => 'boolean',
        ];
    }
}
