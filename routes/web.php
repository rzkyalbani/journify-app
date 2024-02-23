<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home', [
        'title' => 'Home',
        'posts' => Post::all()->load('user', 'category'),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('/categories/{category:slug}', function(Category $category) {

    $posts = Post::where('category_id', $category->id)->get()->load('user', 'category');
    $categories = Category::all();

    return view('pages.home', compact('posts', 'categories'));
});

// Search
Route::get('/search', function (Request $request) {
    $keyword = $request->input('q');
    $posts = Post::where('title', 'like', '%' . $keyword . '%')
        ->orWhere('body', 'like', '%' . $keyword . '%')
        ->get()
        ->load('user', 'category');
    $categories = Category::all();

    return view('pages.home', compact('posts', 'categories'));
});

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);


// Register
Route::get('/register', [AuthController::class, 'register']);
Route::post('/store', [AuthController::class, 'store']);


// Logout 
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Profile Page
Route::get('/profile', [UserController::class, 'index'])->middleware('auth');
Route::post('/profile', [UserController::class, 'update'])->middleware('auth');
