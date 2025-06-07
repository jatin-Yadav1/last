<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OtpVerificationController extends Controller
{
    public function index($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            flash()->error('Invalid or expired verification link. Please register again or check your email.');
            return redirect()->route('login');
        }

        // If already verified
        if ($user->email_verified_at) {
            flash()->info('Your email is already verified. Please login.');
            return redirect()->route('login');
        }

        return view('auth.email-verification', compact('user')); // Pass user to view if needed
        // return view('auth.user-detail', compact('user')); // Pass user to view if needed
    }

    public function verifyOtp(Request $request)
    {
        try {
            // Validate request data
            $validator = Validator::make($request->all(), [
                'otp' => 'required|digits:6',
                'remember_token' => 'required|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $validated = $validator->validated();

            // Attempt to find user with matching token
            $user = User::where('remember_token', $validated['remember_token'])->first();

            if (!$user) {
                flash()->error('Invalid or expired verification link. Please register again or check your email.');
                return redirect()->route('login');
            }

            // Compare OTP
            if ($validated['otp'] === $user->otp) {
                $user->update([
                    'email_verified_at' => now(),
                    // 'remember_token' => null, // optional: clear token after use
                    'otp' => null              // optional: clear otp after use
                ]);

                flash()->success('Your email has been verified successfully!');
                return redirect()->route('thank-you', ['token' => 'success']);
            } else {
                return back()->withErrors(['otp' => 'Invalid OTP. Please try again.'])->withInput();
            }
        } catch (Exception $e) {
            flash()->error('Something went wrong. Please try again later.');
            return redirect()->back()->withInput();
        }
    }

    public function tokenVerification($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            flash()->error('Invalid or expired verification link. Please register again or check your email.');
            return redirect()->route('login');
        }

        // If already verified
        if ($user->email_verified_at) {
            flash()->info('Your email is already verified. Please login.');
            return redirect()->route('login');
        }

        return view('auth.email-verification', compact('user')); // Pass user to view if needed
    }

    public function reSend($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            flash()->error('Invalid or expired verification link. Please register again or check your email.');
            return redirect()->route('login');
        }

        // If already verified
        if ($user->email_verified_at) {
            flash()->info('Your email is already verified. Please login.');
            return redirect()->route('login');
        }

        $remember_token = Str::random(64);

        $validated['remember_token'] = $remember_token;
        $validated['otp'] = rand(111111, 999999);
        $user->update($validated);

        try {
            Mail::to($user->email)->send(new EmailVerification($user));
            Log::info('Email sent: ');
        } catch (Exception $e) {
            Log::error('Email not sent. Error: ', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
        }

        flash()->success('OTP Re-Send successfully.');
        return redirect()->route('verify', ['token'=> $remember_token]);
        // return view('auth.email-verification', compact('user'));
    }
}
