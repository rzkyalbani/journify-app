<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return redirect()->back()->withInput()->with('loginError', 'Username or password incorrect. Please try again');
    }

    public function register()
    {
        return view('pages.auth.register', [
            'title' => 'Register'
        ]);
    }
}
