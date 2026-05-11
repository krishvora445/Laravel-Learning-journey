<?php
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;



Route::get('/', function () {
//    return view('ideas');

//method 1 to access data from database
//    $ideas  = DB::table('ideas')->get();

//     $ideas = Idea::where('state', 'pending')->get();
     $ideas = Idea::query()->when(request('state'), function ($query, $state) {
         $query->where('state', $state);
     })->get();

//     $ideas = Idea::find(1);
//
//     dd($ideas);
//     return $ideas;



//    return $ideas[0]->description ;
//    dd($ideas);

    return view('ideas', ['ideas' => $ideas]);
});

Route::post('/ideas', function () {


    // we just fatch idea form post reqvest

    Idea::create([
        'description' => request('idea'),
        'state' => 'pending',
    ]);

    return redirect('/');
});



//only tempreory del

Route::get('/delete-ideas', function () {
    session()->forget('ideas');
    return redirect('/');
});




