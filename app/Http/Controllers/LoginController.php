<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
     
            return Inertia::render('Login', [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),]);
        }
  
    }
    

