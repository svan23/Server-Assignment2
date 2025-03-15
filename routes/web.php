<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UsersController;

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UsersController::class, 'login']);

Route::post('/logout', [UsersController::class, 'logout']);

// Registration routes
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [UsersController::class, 'register']);

Route::get('/', [ArticlesController::class, 'index'])->name('index');

Route::get('/articles/{id}', [ArticlesController::class, 'show']);
