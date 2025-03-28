<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;

Route::get('/articles', function () {
    $today = date("Y-m-d");

    // Filter articles where the current date is within the start and end dates
    $articles = Article::where('start_date', '<=', $today)
                       ->where('end_date', '>=', $today)
                       ->get();
    return $articles;
});

