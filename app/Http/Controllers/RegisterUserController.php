<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
        //dd('Registered');
                // validate
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'], // password confirmation
        ]);
        // create the account
        //dd($attributes);
        $user = User::create($attributes);
        //dd($user);
        
        // sign in
        Auth::login($user);

        // redirect somewhere
        return redirect('/');
    }
}
