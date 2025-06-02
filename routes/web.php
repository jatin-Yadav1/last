<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coming-soon', function () {
    return view('coming-soon');
});