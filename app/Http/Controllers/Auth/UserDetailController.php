<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hobby;
use App\Models\User;
use App\Models\UserHobby;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserDetailController extends Controller
{
    public function index($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            flash()->error('Invalid or expired verification link. Please register again or check your email.');
            return redirect()->route('login');
        }

        // // If already verified
        // if ($user->email_verified_at) {
        //     flash()->info('Your email is already verified. Please login.');
        //     return redirect()->route('login');
        // }
        $user->update([
            'email_verified_at' => now(),
        ]);
        $categories = Category::where('status', true)->get(); // or filter as needed
        $hobbies = Hobby::where('status', true)->get();

        // Group hobbies by type
        $hobbies = $hobbies->groupBy('type');

        flash()->success('Your email has been verified successfully!');
        return view('auth.user-detail', compact(['user', 'categories', 'hobbies'])); // Pass user to view if needed
    }

    public function update(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|string',
            'hobby_ids' => 'required|string',
            'remember_token' => 'required|string'
        ]);

        if ($validator->fails()) {
            flash()->error($validator->errors()->first());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validated();
        try {

            // Attempt to find user with matching token
            $user = User::where('remember_token', $validated['remember_token'])->first();

            if (!$user) {
                flash()->error('Invalid or expired verification link. Please register again or check your email.');
                return redirect()->route('login');
            }
            $hobbies = explode(",", $validated['hobby_ids']);
            foreach ($hobbies as $key => $hobby) {
                UserHobby::create([
                    'user_id' => $user->id,
                    'hobby_id' => $hobby
                ]);
            }

            $user->update([
                'category_id' => $validated['category_id'],
                'remember_token' => null, // optional: clear token after use
                'otp' => null              // optional: clear otp after use
            ]);

            flash()->success('Your email has been verified successfully!');
            return redirect()->route('thank-you', ['token' => 'success']);
        } catch (Exception $e) {
            Log::error('User signup failed', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'request_data' => $request->except('password'), // Exclude sensitive data
            ]);
            flash()->error('Something went wrong. Please try again later.');
            return redirect()->back()->withInput();
        }
    }
}
