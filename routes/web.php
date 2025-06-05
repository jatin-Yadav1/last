<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//      return view('coming-soon');
// });

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
