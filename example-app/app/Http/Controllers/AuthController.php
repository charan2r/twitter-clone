<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        $validated = request()->validate([
            'name' => 'required|min:3|max:30', 
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password'])
        ]);

        return redirect()->route('homepage')->with('success','Account created successfully.');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate([ 
            'email' => 'required|email', 
            'password' => 'required|confirmed'
        ]);

        if(auth()->attempt($validated)){

            request()->session()->regenerate();           
            return redirect()->route('homepage')->with('success','Logged in successfully.');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found'
        ]);

    }

}
