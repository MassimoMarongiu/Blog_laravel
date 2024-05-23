<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

// login
    public function login()
    {
        return view("auth.login");
    }

// authenticate login
    public function authenticate()
    {
        // dd(request()->all());
        // validate
        $validated = request()->validate([
            "email" => "required|email",
            "password" => "required|min:8|max:16"
        ]);

        if(auth()->attempt($validated)){
            request()->session()->regenerate();

            return redirect()->route("")->with("success","Logged successfully!");
            // return redirect()->route("dashboard")->with("success","Logged successfully!");
        };
        return redirect()->route("login")->withErrors([
            "email"=> "No matching credentials found"
        ]);
    }


// register
    public function register()
    {
        return view("auth.register");
    }

    // validate register
    public function store()
    {
        $validated = request()->validate([
            'name' => "required|min:3|max:40",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8|max:16"
        ]);

        //  create User
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        // redirect
        // return redirect()->route('dashboard')->with('success', 'Account created successfully!');
        return redirect()->route('/')->with('success', 'Account created successfully!');
    }

    //logout
    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // return redirect()->route('dashboard')->with('success', 'Logout succeded successfully!');
        return redirect()->route('/')->with('success', 'Logout succeded successfully!');

    }
}
