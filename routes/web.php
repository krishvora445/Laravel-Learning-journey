<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
//    return view('ideas');

    $ideas = session()->get('ideas', []); // we fatch idea from session

//    dd($ideas);

    return view('ideas', ['ideas' => $ideas]);
});

Route::post('/ideas', function () {
//    dd(request()->all());
//    dd(request('idea'));

    $idea = request('idea'); // we just fatch idea form post reqvest

    session()->push('ideas', $idea  ); // we put idea in to session

    return redirect('/');
});

//Route::post('/ideas', function () {
//
////    $ideas = \Illuminate\Support\Facades\Request::input('ideas');
//
//});

//Route::post('/ideas', function (Request $request) {
//
//    $request->idea;
//
//});

//only tempreory del

Route::get('/delete-ideas', function () {
    session()->forget('ideas');
    return redirect('/');
});




