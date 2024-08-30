<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create() {
        //dd('login create here');
        return view('auth.login');
    }

    public function store() {
        $attributes = request()->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required'],

        ]);
        Auth::attempt($attributes);
        request()->session()->regenerate();
        
        return redirect('/');
    }
    

    public function destroy() {
        //dd('logged the user out');
        Auth::logout();
        return redirect('/');
    }
}
