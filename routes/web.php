<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

// Get signup and signin forms
Route::get('/signup', [AuthController::class, 'signup']);
Route::get('/signin', [AuthController::class, 'signin']);

Route::post('/signup', [AuthController::class, 'createAccount'])->name('signup');
Route::post('/signin', [AuthController::class, 'loginAUser'])->name('signin');
Route::post('/signout', [AuthController::class, 'signoutAUser'])->name('signout');


// CRUD for links
Route::get('/links', [LinkController::class, 'index']);
Route::get('/submit', [LinkController::class, 'create'])->middleware('auth:web');
Route::get('/links/{link}', [LinkController::class, 'show'])->name('link');
Route::post('/submit', [LinkController::class, 'store']);
Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->middleware('auth:web');
Route::put('/links/{link}/edit', [LinkController::class, 'update']);
Route::delete('/links/{link}', [LinkController::class, 'destroy'])->middleware('auth:web');
