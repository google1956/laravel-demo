<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('isLoggedIn');

Route::get('/login', [UserController::class, 'login'])->middleware('alreadyLoggedIn'); //controller and method
Route::post('/login-user', [UserController::class, 'loginUser'])->name('login-user'); //controller and method

Route::get('/logout', [UserController::class, 'logout']); //controller and method

Route::get('/registration', [UserController::class, 'registration'])->middleware('alreadyLoggedIn'); //controller and method
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register-user'); //controller and method

Route::get('/', [CustomController::class, 'dashboard'])->middleware('isLoggedIn'); //controller and method
Route::get('/tourism', [CustomController::class, 'tourism'])->middleware('isLoggedIn');//controller and method
Route::get('/food', [CustomController::class, 'food'])->middleware('isLoggedIn');//controller and method
Route::get('/about', [CustomController::class, 'about'])->middleware('isLoggedIn');//controller and method
