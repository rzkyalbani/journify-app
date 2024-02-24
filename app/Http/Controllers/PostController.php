<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function create()
    {
        return view('pages.posts.create', [
            'title' => 'Create Post',
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validate = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('posts')],
            'body' => ['required', 'string', 'min:200'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048']
        ]);

        $imagePath = $request->file('post_image')->store('posts-images');
        if ($imagePath) {
            $validate['image'] = $imagePath;
        }
        $validate['user_id'] = $user->id;
        $validate['category_id'] = $request->category;
        $validate['created_at'] = now();

        Post::insert($validate);

        return redirect()->route('mypost', ['user' => $user])->with('createSuccess', 'Post has been created');
    }

    public function edit(Post $post)
    {
        if (!Gate::allows('edit-post', $post)) {
            return redirect()->route('mypost', ['user' => Auth::user()])->with('editError', 'That post is not yours :<');
        }
        return view('pages.posts.edit', [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {   
        $user = Auth::user();
        
        $validate = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('posts')->ignore($post->id)],
            'body' => ['required', 'string', 'min:200'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048']
        ]);

        $post->update($validate);

        if ($request->input('category')) {
            $post->category_id = $request->input('category');
        }

        if ($request->file('edit_post_image')) {
            $post->image = $request->file('edit_post_image')->store('posts-images');
        }

        $post->update();

        return redirect()->route('mypost', ['user' => $user])->with('updateSuccess', 'Post has been updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('mypost', ['user' => Auth::user()])->with('deleteSuccess', 'Post has been deleted');
    }
}
