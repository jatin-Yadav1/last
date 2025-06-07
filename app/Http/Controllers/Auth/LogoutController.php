<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function perform()
    {
        Auth::logout(); // logs out the user

        Session::invalidate(); // invalidates the session
        Session::regenerateToken(); // regenerates CSRF token for security
        flash()->success('You have been successfully logged out!');
        return redirect()->route('login');
    }
}
