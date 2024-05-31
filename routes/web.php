<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home
Route::get('/', [HomeController::class, 'showHome'])->name('home');
 Route::get('/', function () {
     return Inertia::render('Home');
 })->middleware('auth.token');



//signup

Route::get('/signup', function () {
    return Inertia::render('Signup');
})->name('signup');

Route::post('/signup', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'store']);
//login
 Route::get('/login', function () {
    return Inertia::render('Login');
 })->name('login');
//  Route::get('/login', function(){
//     return Inertia('Login');
// });
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

//logout
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');
//delete user
Route::delete('/', [UserController::class, 'destroy'])->name('delete');
//profile
Route::get('/profile', function () {
    return Inertia::render('Profile');
})->name('profile');