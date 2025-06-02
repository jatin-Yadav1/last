<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return view('coming-soon');
});

// Route::get('/coming-soon', function () {
//     return view('coming-soon');
// });