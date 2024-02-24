<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    public function edit(Post $post) 
    {   
        if (!Gate::allows('edit-post', $post)) {
            abort(403);
        }
        return view('pages.posts.edit', [
            'title' => 'Edit Post', 
            'post' => $post
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('mypost', ['user' => Auth::user()])->with('deleteSuccess', 'Post has been deleted');
    }
}
