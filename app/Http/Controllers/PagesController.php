<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Home Page
    public function index() {
        return view('index')->with('posts', Post::orderBy('created_at', 'DESC')->limit(2)->offset(0)->get());
    }

    // Manage Users' Blogs
    public function manage() {
        // dd(auth()->user()->id);
        $userId = auth()->user()->id;
        return view('myposts')->with('myposts', Post::where('user_id', $userId)->get());
    }

    // Not Found Page (404)
    public function notfound() {
        return view('errors.notfound');
    }
}