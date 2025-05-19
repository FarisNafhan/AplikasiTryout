<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // login
    public function login() {
        return view('aplikasitryout.login');
    }

    // register
    public function register() {
        return view('aplikasitryout.register');
    }
}
