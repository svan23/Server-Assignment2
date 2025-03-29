<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\User;

Route::get('/articles', function () {
    $today = date("Y-m-d");

    // Filter articles where the current date is within the start and end dates
    $articles = Article::where('start_date', '<=', $today)
        ->where('end_date', '>=', value: $today)
        ->get();
    return $articles;
});

Route::get('/articles/{id}', function ($id) {
    // Find the article by ID and check if the current date is within the start and end dates
    $article = Article::find($id);

    if ($article) {
        $contributer = User::where('username', $article->contributor_username)->first();
        if ($contributer) {
            $article->contributor_name = $contributer->first_name . ' ' . $contributer->last_name;
        } else {
            $article->contributor = null;
        }
        return $article;
    } else {
        return response()->json(['message' => 'Article not found or not available'], 404);
    }
});
