<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome',[
        'tasks' => [
            'do workout',
            'drink',
            'This is demo',
        ]
]);
});

Route::view('contact', 'contact');
Route::view('about', 'about');
