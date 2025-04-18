<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UsersController;

Route::get('/about', function () {
    return view('about');
})->name('about');

// Use ArticlesController@index as the homepage (index route)
Route::get('/', [ArticlesController::class, 'index'])->name('index');
Route::get('/articles/{id}', [ArticlesController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin routes within auth middleware (replace 'auth' with 'admin' if needed)
    Route::get('/admin/users', [UsersController::class, 'adminIndex']);
    Route::post('/admin/users/{id}', [UsersController::class, 'adminUpdate']);

    // Article routes
    Route::get('/create_article', [ArticlesController::class, 'create']);
    Route::get('/update_article/{id}', [ArticlesController::class, 'edit']);
    Route::post('/articles', [ArticlesController::class, 'store']);
    Route::put('/articles/{id}', [ArticlesController::class, 'update']);
    Route::delete('/articles/{id}', [ArticlesController::class, 'destroy']);
});



require __DIR__.'/auth.php';
