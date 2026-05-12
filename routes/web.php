<?php
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;

Route::view('/', 'Home');

Route::view('/about', 'about');


//index

Route::get('/ideas', function () {

     $ideas = Idea::all();



    return view('ideas.index', ['ideas' => $ideas]);
});


//Route::get('/ideas/{id}', function ($id) {

//     $idea = Idea::find($id);
////     return ($idea);
////    if (!$idea) {
////        abort(404);
////    }
////    if (is_null($idea)) {
////        abort(404);
////    }
//    return view('ideas.show', ['idea' => $idea]);
//});


//Route::get('/ideas/{id}', function ($id) {
//
//     $idea = Idea::findOrFail($id);
//
//    return view('ideas.show', ['idea' => $idea]);
//});

//show

Route::get('/ideas/{idea}', function (Idea $idea) {

//    dd($idea);
  return view('ideas.show', ['idea' => $idea]);
});

//edit

Route::get('/ideas/{idea}/edit',function (Idea $idea) {

    return view('ideas.edit', ['idea' => $idea]);
});

//update

Route::patch('/ideas/{idea}',function (Idea $idea) {
//    request()->validate([
//        'description' => ['required', 'string'],
//    ]);

    $idea->update([
        'description' => request('description'),
    ]);


     return redirect("/ideas/{$idea->id}");

});

//store

Route::post('/ideas', function () {



   // we just fatch idea form post reqvest

    Idea::create([
        'description' => request('description'),
        'state' => 'pending',
    ]);

    return redirect('/ideas');
});

//destroy

Route::delete('/ideas/{idea}', function (Idea $idea) {


//    dd($idea->id);

//    Idea::destroy($idea->id); //This is mine code
    $idea->delete(); //     This is the code of laracasts
    return redirect('/ideas');
});



