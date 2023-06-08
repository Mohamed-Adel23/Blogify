<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // Show All Posts
    public function index()
    {
        $posts = Post::all();
        return view('blogs.index')
        ->with('posts', Post::orderBy('created_at', 'DESC')->get());
    }

    // Create New Post (GET)
    public function create()
    {
        return view('blogs.create');
    }

    // Store The Post in The DB (POST)
    public function store(Request $request)
    {
        // Some Validation
        $fieldsValidate = $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5048']
        ]);

        // Add The Slug To The Current Post
        $slug = Str::slug($fieldsValidate['title'], '-');
        $fieldsValidate['slug'] = $slug;

        // Make A Unique Name For Each Image and Store it
        $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('posts_images'), $newImageName);
        $fieldsValidate['image'] = $newImageName;

        // Add The Owner of The Post
        $fieldsValidate['user_id'] = auth()->user()->id;

        // Store Data
        Post::create($fieldsValidate);

        // Redirection
        return redirect('/blog')->with('message', 'Success! Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
