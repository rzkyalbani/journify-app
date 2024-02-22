<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.profile', [
            'title' => 'Profile',
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request) 
    {   
        $authedUser = Auth::user();

        $user = User::where('username', $authedUser->username)->first();
        
        $validate = $request->validate([
            'name' => ['required', 'min:8', 'max:255'],
            'username' => ['required', 'string', 'min:6' , 'max:255', 'unique:users,username'],
        ]);


        $user->name = $request->name;
        $user->username = $request->username;

        $user->update();

        return redirect('/profile')->with('updateSuccess', 'Profile updated successfully');
    }
}
