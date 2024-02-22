<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login
    public function login()
    {
        return view('pages.auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $remember = $request->remember;

        $credentials = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return redirect()->back()->withInput()->with('loginError', 'Username or password incorrect. Please try again');
    }

    // Regsiter
    public function register()
    {
        return view('pages.auth.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) 
    {
        $validate = $request->validate([
            'name' => ['required', 'min:8', 'max:255'],
            'username' => ['required', 'string', 'min:6' , 'max:255', 'unique:users,username'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        $data = $request->except('password', 'password_confirmation', '_token');
        $data['password'] = Hash::make($request->password);
        User::insert($data);

        return redirect('/login');
    }

    // Logout
    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
