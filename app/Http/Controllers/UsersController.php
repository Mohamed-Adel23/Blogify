<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    // Show The Register Page (GET)
    public function create() {
        return view('users.register');
    }

    // Create New User (Post)
    public function store(Request $request) {
        // dd($request);
        // Validate Input Fields
        $fieldsValidate = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        // Hash The Password
        $fieldsValidate['password'] = bcrypt($fieldsValidate['password']);

        // Store Data in DB
        $user = User::create($fieldsValidate);

        // Login Directly into Home Page
        auth()->login($user);

        return redirect('/')->with('message', 'Congratulations! Your accout has been created');
    }

    // Log User Out
    public function logout(Request $request) {
        // LogOut
        auth()->logout();
        // Invalidate The Session
        $request->session()->invalidate();
        // Regenerate The Session Token
        $request->session()->regenerateToken();
        // Redirect
        return redirect('/')->with('message', 'You have been logged out!!');
    }

    // Log User In (GET)
    public function login() {
        return view('users.login');
    }

    // User Authentication (POST)
    public function authenticate(Request $request) {
        // Input Validation
        $fieldsValidate = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // Auth The User
        if(auth()->attempt($fieldsValidate)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Welcome Back!');
        }

        // If The User Not Found
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}