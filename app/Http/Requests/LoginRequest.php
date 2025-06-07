<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => 'required|string',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'The login field is required. Use email, phone, or username.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ];
    }

    public function getCredentials()
    {
        $login = $this->get('login');

        if ($this->isEmail($login)) {
            return ['email' => $login, 'password' => $this->get('password')];
        }

        if ($this->isPhoneNumber($login)) {
            return ['number' => $login, 'password' => $this->get('password')];
        }

        return ['username' => $login, 'password' => $this->get('password')];
    }

    private function isEmail($param): bool
    {
        $factory = $this->container->make(ValidationFactory::class);
        return !$factory->make(['login' => $param], ['login' => 'email'])->fails();
    }

    private function isPhoneNumber($param): bool
    {
        return preg_match('/^\+?[0-9]{10,15}$/', $param);
    }

    public function getLoginType(): string
    {
        $login = $this->get('login');

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }

        if (preg_match('/^\+?[0-9]{10,15}$/', $login)) {
            return 'phone';
        }

        return 'username';
    }
}
