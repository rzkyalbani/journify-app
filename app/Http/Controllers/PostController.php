<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    public function edit(Post $post)
    {
        if (!Gate::allows('edit-post', $post)) {
            return redirect()->route('mypost', ['user' => Auth::user()])->with('editError', 'That post is not yours :<');
        }
        return view('pages.posts.edit', [
            'title' => 'Edit Post',
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'body' => 'required|string|min:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $post->update($validate);

        return redirect()->route('mypost', ['user' => Auth::user()])->with('updateSuccess', 'Post has been updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('mypost', ['user' => Auth::user()])->with('deleteSuccess', 'Post has been deleted');
    }
}
