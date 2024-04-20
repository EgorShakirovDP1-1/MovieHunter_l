<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;


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


Route::get('/', [HomeController::class, 'showHome'])->name('home');

Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login');




Route::get('/signup', function () {
    return Inertia::render('Signup');
})->name('signup');

Route::post('/signup', [SignupController::class, 'register'])->name('register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::get('/register', [SignupController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [SignupController::class, 'store']);

Route::get('/login', [SignupController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [SignupController::class, 'authenticate']);

