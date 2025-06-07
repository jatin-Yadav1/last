<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.reset-password');
    }
    public function forgotPassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $user = User::where('reset_token', $request->token)->first();

        if (!$user) {
            return back()->withErrors(['token' => 'Invalid or expired reset token.']);
        }

        // Update the user's password and clear reset-related fields
        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successfully. You can now log in.');
    }

    /**
     * Display the OTP verification page.
     *
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function otpVerifyShow($token)
    {
        return view('auth.otp-verify', compact('token'));
    }

    /**
     * Verify the OTP provided by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
            'token' => 'required',
        ]);

        $user = User::where('reset_token', $request->token)->first();

        if (!$user || $user->otp !== $request->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }

        // Optionally, you can check if the OTP is expired.
        if (now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
        }

        // OTP verified, proceed with resetting the password or login.
        Session::put('otp_verified', true);
        return redirect()->route('password.reset', ['token' => $request->token]);
    }

    /**
     * Resend the OTP to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resendOtp(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        $user = User::where('reset_token', $request->token)->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid token.'], 400);
        }

        // Generate a new OTP
        $otp = random_int(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10); // OTP valid for 10 minutes
        $user->save();

        // Send OTP to the user (e.g., via email or SMS)
        // Replace this with your notification logic
        Log::info("OTP for user {$user->email}: {$otp}");

        return response()->json(['message' => 'OTP has been resent successfully.']);
    }
}
