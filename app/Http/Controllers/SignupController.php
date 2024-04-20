<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserAuthenticateRequest;


class SignupController extends Controller
{
    public function register() {
        return Inertia::render('Signup');
    }

    public function store(UserCreateRequest $request) {

        User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),]);

        // Mail::to($user->email)
        // ->send(new WelcomeEmail($user));

        return redirect()->route('home')->with('message', 'Registered successfully!');
    }

    public function login() {
        return Inertia::render('Login');
    }

    public function authenticate(UserAuthenticateRequest $request){

        if(auth()->attempt($request->validated())){
            request()->session()->regenerate();

            return redirect()->route('home')->with('message', 'Loged In successfully!');
        };

        return redirect()->route('login')->withErrors([
            'email'=> "Failed to log in! Please try again!"
        ]);
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home')->with('message', 'Loged Out successfully!');
    }
}