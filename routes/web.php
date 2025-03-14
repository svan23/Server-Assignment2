<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;




Route::get('/login', function () {
    return view('login');
});

Route::get('/', [ArticlesController::class, 'index'])->name('index');

Route::get('/articles/{id}', [ArticlesController::class, 'show']);
