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
        return view('blogs.index')
        ->with('posts', Post::orderBy('created_at', 'DESC')->filter(request(['tag', 'search']))->simplePaginate(3));
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
            'tags' => ['required', 'min:3'],
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

        // echo '<pre>';
        // dd(var_dump($fieldsValidate));
        // echo '</pre>';

        // Store Data
        Post::create($fieldsValidate);

        // Redirection
        return redirect('/blog')->with('message', 'Success! Post Created Successfully!');
    }

    // Show Single Post
    public function show(string $slug)
    {
        return view('blogs.show')->with('post', Post::where('slug', $slug)->first());
    }

    // Edit a Post (GET)
    public function edit(string $slug)
    {
        $postData = Post::where('slug', $slug)->first();
        // Only Current user posts can reach to them
        if(auth()->user()->id !== $postData['user_id']) {
            return redirect('/notfound');
        }
        return view('blogs.edit')->with('post', $postData);
    }

    // Update a Post (POST)
    public function update(Request $request, string $slug)
    {
        // Some Validation
        $fieldsValidate = $request->validate([
            'title' => ['required', 'min:3'],
            'tags' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'image' => ['mimes:jpg,png,jpeg', 'max:5048']
        ]);

        // Add The Slug To The Current Post
        $newSlug = Str::slug($fieldsValidate['title'], '-');
        $fieldsValidate['slug'] = $newSlug;

        // Check if the user choose a new image
        if($request->hasFile('image')) {
            // Make A Unique Name For Each Image and Store it
            $newImageName = uniqid() . '-' . $newSlug . '.' . $request->image->extension();
            $request->image->move(public_path('posts_images'), $newImageName);
            $fieldsValidate['image'] = $newImageName;
        }

        // Update Data
        Post::where('slug', $slug)->update($fieldsValidate);

        // Redirection
        return redirect('/blog/' . $newSlug)->with('message', 'Success! Post Updated Successfully!');
    }

    // Delete The Post
    public function destroy(string $slug)
    {
        Post::where('slug', $slug)->delete();
        return redirect('/blog')->with('delete', 'Success! Post Deleted Successfully!');
    }
}