<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create () {
        return view('auth.login');
    }

    public function store () {
        $credentials = request()->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required'
        ]);

        if(auth()->attempt($credentials)) {
            session()->regenerate();
            return redirect('/posts')->with('success', "Welcome back!");
        }

        //auth failed:
        throw ValidationException::withMessages([
            'email'=> 'The provided credentials could not be verified!'
        ]);
//        return back()
//            ->withInput()
//            ->withErrors(['email', 'The provided credentials could not be verified!']);
    }

    public function destroy () {

        auth()->logout();

       return redirect('/posts')->with('success', "good bye!");
    }
}
