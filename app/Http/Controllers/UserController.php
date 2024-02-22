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
        // return $request->file('profile_picture')->store('profile-pictures');
        $authedUser = Auth::user();

        $user = User::where('username', $authedUser->username)->first();

        $validate = $request->validate([
            'name' => ['required', 'min:8', 'max:255'],
            'username' => ['required', 'string', 'min:6', 'max:255'],
            'profile_picture' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024']
        ]);


        $user->name = $request->name;

        if ($request->username) {
            $user->username = $request->username;
        }

        if ($request->file('profile_picture')) {
            $user->profile_picture = $request->file('profile_picture')->store('profile-pictures');
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return redirect('/profile')->with('updateSuccess', 'Profile updated successfully');
    }
}
