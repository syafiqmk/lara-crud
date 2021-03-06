<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardPostsController;
use App\Http\Controllers\MainController;

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

// main routes
Route::get('/', [MainController::class, 'index']);
Route::get('/post/{id}', [MainController::class, 'show']);
// auth routes
//login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
//registration
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registerProcess'])->middleware('guest');
//logout
Route::post('/logout', [AuthController::class, 'logout']);

// dashboard route
Route::get('/dashboard', function() {
        return view('dashboard.index', ['title' => 'Dashboard']);
    })->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostsController::class)->middleware('auth');
