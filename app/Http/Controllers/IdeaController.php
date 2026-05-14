<?php

namespace App\Http\Controllers;
use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::query()->where('user_id', Auth::id())->get();

        return view('ideas.index', [
            'ideas' => $ideas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ideas = Idea::all();

        return view('ideas.create', [
            'ideas' => $ideas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdeaRequest $request)
    {


        Idea::create([
            'description' => request('description'),
            'state' => 'pending',
            'user_id' => Auth::id()
//            'user_id' => Auth::user() //to access user of current session
        ]);

        return redirect('/ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        $idea->update([
            'description' => request('description'),
        ]);

//        dd($idea);
        return redirect("/ideas/{$idea->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect('/ideas');
    }
}
