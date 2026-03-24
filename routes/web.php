<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('krish');
// });
Route::get('/krish', function () {
    return view('krish');
});
Route::get('/about', function () {
    return view('about');
//     return 'About us';// Most of the time I didn't want to use this, but there are certain situations where I use.
});
Route::get('/contact', function () {
    return view('contact');
//     return 'About us';// Most of the time I didn't want to use this, but there are certain situations where I use.
});

