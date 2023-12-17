<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create () {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'username' => $this->generateUsername($validatedData['name']),
        ]);

        // Log the user in
        auth()->login($user);

        // Redirect or perform any other action after user creation
        return redirect('/posts')->with('success', 'User created successfully!');
    }

    // Helper function to generate username based on name
    private function generateUsername($name)
    {
        // Replace spaces with underscores and make lowercase
        return Str::lower(str_replace(' ', '_', $name));
    }

}
