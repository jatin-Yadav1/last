<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\OtpVerificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Auth\ThankYouController;
use App\Http\Controllers\Auth\UserDetailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Portal\UserEducationController;
use App\Http\Controllers\Portal\UserExperienceController;
use App\Http\Controllers\Portal\UserSkillController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;

// Route::get('/coming-soon', function () {
//     return view('coming-soon');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('about', [HomeController::class, 'about'])->name('home.about');
Route::get('service', [HomeController::class, 'service'])->name('home.service');
Route::get('blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('project', [HomeController::class, 'project'])->name('home.project');
Route::get('resume', [HomeController::class, 'resume'])->name('home.resume');
Route::get('download-cv', [ResumeController::class, 'download'])->name('cv.download');


Route::group(['middleware' => ['guest']], function () {
    // Routes for unauthenticated users

    Route::group(['prefix' => 'auth'], function () {

        Route::get('login', [LoginController::class, 'index'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('auth.login');

        //  New User
        Route::get('signup', [RegisterController::class, 'index'])->name('signup');
        Route::post('signup', [RegisterController::class, 'signup'])->name('auth.signup');

        Route::get('verification/{token}', [OtpVerificationController::class, 'tokenVerification'])->name('token.verification');

        // Forgot & Reset Password
        Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
        Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('auth.forgot-password');
        Route::get('reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
        Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

        // OTP Verification
        Route::get('verify/{token}', [OtpVerificationController::class, 'index'])->name('verify');
        Route::get('re-send/{token}', [OtpVerificationController::class, 'reSend'])->name('re-send.otp');
        Route::post('verify-otp', [OtpVerificationController::class, 'verifyOtp'])->name('verify.otp');
        Route::get('verification/{token}', [OtpVerificationController::class, 'tokenVerification'])->name('token.verification');


        // User Detail Update
        Route::get('user-detail/{token}', [UserDetailController::class, 'index'])->name('user-detail');
        Route::post('user-detail', [UserDetailController::class, 'update'])->name('user-detail.update');

        // Optional: Thank You / Confirmation Page
        Route::get('thank-you/{token}', [ThankYouController::class, 'index'])->name('thank-you');
    });
});

Route::middleware(['auth'])->prefix('portal')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('portal.dashboard');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('portal.dashboard');
    Route::get('analytics', [DashboardController::class, 'analytics'])->name('portal.analytics');
    Route::get('profile', [ProfileController::class, 'index'])->name('portal.profile');

    // Custom AJAX routes for modal
    Route::get('skills/form', [UserSkillController::class, 'createAndUpdate'])->name('skills.form');    // Route::get('skills/{skill}/edit-form', [UserSkillController::class, 'edit'])->name('skills.edit-form'); // Edit Modal

    Route::resource('skills', UserSkillController::class);
    Route::post('skill-update', [UserSkillController::class, 'ajaxUpdate'])->name('skill.ajax.update');

    Route::resource('educations', UserEducationController::class);
    Route::resource('experiences', UserExperienceController::class);

    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
});
