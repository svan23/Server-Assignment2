<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = date("Y-m-d");

        // Filter articles where the current date is within the start and end dates
        $articles = Article::where('start_date', '<=', $today)
                           ->where('end_date', '>=', $today)
                           ->get();

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Only allow approved contributors; login check already ensures approval.
        if (session('role') !== 'contributor') {
            abort(403, 'Unauthorized access');
        }

        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and store article data, e.g.
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        // Create new article; assuming that contributor_username is the logged in user's username
        \App\Models\Article::create([
            'title'                => $request->title,
            'body'                 => $request->body,
            'create_date'          => date("Y-m-d"),
            'start_date'           => $request->start_date,
            'end_date'             => $request->end_date,
            'contributor_username' => session('username'),
        ]);

        return redirect()->route('index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::where('article_id', $id)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::where('article_id', $id)->firstOrFail();

        // Ensure that only the creator can edit
        if (session('username') !== $article->contributor_username) {
            abort(403, 'Unauthorized access.');
        }

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $article = Article::where('article_id', $id)->firstOrFail();

        // Ensure that only the creator can update
        if (session('username') !== $article->contributor_username) {
            abort(403, 'Unauthorized access.');
        }

        // Validate the incoming data
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'body'       => 'required',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        // Debug: Uncomment the next line to inspect $data
        // dd($data);

        $article->update($data);

        return redirect()->route('index')->with('success', 'Article updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $article = Article::where('article_id', $id)->firstOrFail();

        // Ensure that only the owner can delete the article
        if (session('username') !== $article->contributor_username) {
            abort(403, 'Unauthorized access.');
        }

        $article->delete();

        return redirect()->route('index')->with('success', 'Article deleted successfully.');
    }
}
