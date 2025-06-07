<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request) //LoginRequest
    {
        $credentials = $request->getCredentials();
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            flash()->success('Welcome back, ' . $user->username . '! You have successfully logged in.');
            return $this->successResponse("Welcome back " . $user->username . "! You have successfully logged in.", $user, route('dashboard'));
            // return redirect()->route('portal.dashboard');
        }
        return $this->errorResponse("Login failed. Please check your credentials and try again.", 'ERROR', Response::HTTP_UNPROCESSABLE_ENTITY, new \stdClass());
        flash()->error('Login failed. Please check your credentials and try again.');
        // return redirect()->route('login')->withInput();
    }
}
