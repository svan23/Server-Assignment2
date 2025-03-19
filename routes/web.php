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

// Place the create route here before the dynamic {id} route
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::post('/articles', [ArticlesController::class, 'store']);

Route::get('/article/update/{id}', [ArticlesController::class, 'edit']);
Route::post('/article/update/{id}', [ArticlesController::class, 'update']);
Route::post('/article/delete_process/{id}', [ArticlesController::class, 'destroy']);

// Then the dynamic show route
Route::get('/articles/{id}', [ArticlesController::class, 'show']);

Route::get('/admin/users', [UsersController::class, 'adminIndex']);
Route::post('/admin/users/{id}', [UsersController::class, 'adminUpdate']);
