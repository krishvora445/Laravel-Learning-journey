<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','welcome'); //This is a short version syntax we can use use in static websites.
Route::view('/about','about'); //This is a short version syntax we can use use in static websites.
Route::view('/contact','contact'); //This is a short version syntax we can use use in static websites.

