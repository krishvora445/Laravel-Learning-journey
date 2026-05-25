<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        dd('rhis is');
        return view('Auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd(request()->all());
        $valitdated  =$request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if(Auth::attempt($valitdated)){
            $request->session()->regenerate();
            return redirect()->intended('/ideas');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        return redirect('/ideas');
    }
}
