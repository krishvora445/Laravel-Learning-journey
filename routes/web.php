<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome',[
    'greeting' => 'Hello,',
    'person' => request('person','world'),
]);
});

Route::view('contact', 'contact');
Route::view('about', 'about');
