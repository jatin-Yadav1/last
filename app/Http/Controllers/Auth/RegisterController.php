<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.signup');
    }
    // $validator = Validator::make($request->all(), [
    //     'first_name' => 'required|string|max:255',
    //     'last_name' => 'nullable|string|max:255',
    //     'gender' => 'required|in:male,female,other',
    //     'email' => 'required|email|unique:users,email',
    //     'dob' => 'required|date|before:today',
    //     'password' => 'required|string|min:8|confirmed',
    //     'referral_code' => 'nullable|string|max:50',
    //     'terms' => 'accepted',
    // ]);

    // if ($validator->fails()) {
    //     return redirect()->back()
    //         ->withErrors($validator)
    //         ->withInput();
    // }

    public function signup(SignupRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();

        try {

            $userId = null;
            if (!empty($validated['referral_code'])) {
                $user = User::where('referral_code', $validated['referral_code'])->first();
                $userId = (!empty($user)) ? $user->id : null;
            }
            $remember_token = Str::random(64);
            // Assign role
            $validated['role'] = is_user();
            $validated['account_number'] = generateAccountNumber();
            $validated['referral_code'] = generateReferralCode();
            $validated['referred_by'] = $userId;
            $validated['remember_token'] = $remember_token;
            $validated['otp'] = rand(111111, 999999);
            // Create user
            $user = User::create($validated);

            DB::commit();

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

            flash()->success('User registered successfully.');
            return redirect()->route('verify', ['token'=> $remember_token]);
        } catch (Exception $e) {
            DB::rollBack();

            // Log detailed error info
            Log::error('User signup failed', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'request_data' => $request->except('password'), // Exclude sensitive data
            ]);

            flash()->error('An error occurred during signup. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',  // Ensure OTP is 6 digits
        ]);

        // Check if the OTP matches the one stored in the database or in a session
        $user = User::where('email', $request->user()->email)->first();

        if (!$user || $user->otp !== $request->otp) {
            return response()->json(['message' => 'Invalid OTP. Please try again.'], 400);
        }

        // OTP is correct, update the user's verified status
        $user->email_verified_at = now();
        $user->otp = null;  // Clear OTP after successful verification
        $user->save();

        return response()->json(['success' => true, 'message' => 'OTP verified successfully.']);
    }

    /**
     * Handle the OTP resend request.
     */
    public function resendOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Generate a new OTP and store it in the user record
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
        $user->otp = $otp;
        $user->save();

        // Send OTP via email (you can use a custom Mailable for this)
        // Mail::to($user->email)->send(new OtpMail($otp));

        return response()->json(['success' => true, 'message' => 'OTP has been resent to your email.']);
    }
}
