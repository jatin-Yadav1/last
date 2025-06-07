<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the callback from Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if the user already exists in the database
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            // User exists, log them in
            Auth::login($user, true);
        } else {
            // User does not exist, create a new user
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(24)), // You can generate a random password
            ]);

            // Log the user in
            Auth::login($user, true);
        }

        return redirect()->route('home'); // Redirect to the homepage or dashboard
    }

    // Redirect to Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Handle the callback from Facebook
    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        // Check if the user already exists in the database
        $user = User::where('email', $facebookUser->getEmail())->first();

        if ($user) {
            // User exists, log them in
            Auth::login($user, true);
        } else {
            // User does not exist, create a new user
            $user = User::create([
                'name' => $facebookUser->getName(),
                'email' => $facebookUser->getEmail(),
                'password' => bcrypt(Str::random(24)), // You can generate a random password
            ]);

            // Log the user in
            Auth::login($user, true);
        }

        return redirect()->route('home'); // Redirect to the homepage or dashboard
    }
}
