<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create() {
        //dd('login create here');
        return view('auth.login');
    }

    public function store() {
        return view('/');
    }
}
