<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
    ]);
})->name('home');

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
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth');
