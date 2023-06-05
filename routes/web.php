<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

// Home Page
Route::get('/', [PagesController::class, 'index']);
// -- Blogs Resources --
Route::resource('/blog', PostsController::class);



// -- User Authentication --
// Create New User (GET)
Route::get('/register', [UsersController::class, 'create'])->middleware('guest');
// Store The User In The Database (POST)
Route::post('/users', [UsersController::class, 'store']);
// Log User Out
Route::post('/logout', [UsersController::class, 'logout']);
// Log User In (GET)
Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');
// Auth User (POST)
Route::post('/user', [UsersController::class, 'authenticate']);