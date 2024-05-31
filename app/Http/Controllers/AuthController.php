<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Session;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserAuthenticateRequest;
class AuthController extends Controller
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

        return redirect()->route('Home')->with('message', 'Registered successfully!');
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

    public function showLogin()
    {
        return Inertia::render('Login', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            Session::put('authToken', $token);

            return response()->json(['token' => $token], 200);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

}
