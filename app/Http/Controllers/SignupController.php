<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Inertia\Inertia;

class SignupController extends Controller
{
   /* public function showSignup()
    {
        return Inertia::render('Signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        
        try {
            $user = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('home');
        } catch (\Exception $e) {
            // Log the error message
            \Log::error($e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while creating the account. Please try again.');
        }
    }*/
    public function show()
    {
        return Inertia::render('Signup', [
            'routes' => [
                'register' => 'register',
                // Add other routes here...
            ],
        ]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            Auth::login($user);
    
            return redirect()->intended('dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the account. Please try again.');
        }
    }
public function logout()
{
    Auth::logout();

    return redirect('/');}
    }