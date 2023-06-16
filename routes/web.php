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
// Manage Users' Blogs
Route::get('/manage', [PagesController::class, 'manage'])->middleware('auth');
// Not Found Page (404) which will display when the user attempt to reach unauth page
Route::get('/notfound', [PagesController::class, 'notfound'])->name('notfound');

// -- Blogs Resources --
// Edit Page with authorization
Route::get('/blog/{slug}/edit', [PostsController::class, 'edit'])->middleware('auth');
// Blog Resources
Route::resource('/blog', PostsController::class);
// Create Page with authorization
Route::get('/blog/create', [PostsController::class, 'create'])->middleware('auth');

// -- User Authentication --
// Create New User (GET)
Route::get('/register', [UsersController::class, 'create'])->middleware('guest');
// Store The User In The Database (POST)
Route::post('/users', [UsersController::class, 'store']);
// Log User Out
Route::post('/logout', [UsersController::class, 'logout']);
// Log User In (GET)
Route::get('/login', [UsersController::class, 'login'])->middleware('guest');
// Auth User (POST)
Route::post('/user', [UsersController::class, 'authenticate']);