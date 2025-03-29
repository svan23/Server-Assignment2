@extends('layouts.master')
@section('title', 'Articles')

@section('content')
    {{-- If there's at least one article, show it in the hero section --}}
    @if($articles->count())
        @php
            $featuredArticle = $articles->first();
        @endphp

        <div class="position-relative mb-4" 
             style="background: url('https://i.pinimg.com/736x/b2/75/a9/b275a93889acbb4eb8c993edc6bc44bc.jpg') 
                    no-repeat center center; 
                    background-size: cover; 
                    height: 500px;">
            <!-- Dark overlay for readability -->
            <div class="position-absolute top-0 w-100 h-100" style="background: rgba(107, 81, 91, 0.5);"></div>

            <!-- Featured article text container -->
            <div class="container h-100 d-flex flex-column justify-content-center" style="position: relative;">
                <h1 class="display-4 arizonia-text text-white fw-bold mb-2" style="max-width: 600px;">
                    {{ $featuredArticle->title }}
                </h1>
                <p class="lead arizonia-text text-white" style="max-width: 600px;">
                    {{-- Limit the body text to ~200 characters for a neat overlay --}}
                    {{ \Illuminate\Support\Str::limit(strip_tags($featuredArticle->body), 200, '...') }}
                </p>
                <div>
                    <a href="{{ url('/articles', ['id' => $featuredArticle->article_id]) }}" 
                        class="btn btn-primary"
                        style="background-color: #dfbcc2; border-color: #ffffff; color: white; font-weight: bold;">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    @endif

    {{-- Display error messages (flash) --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Create Article button (only for contributors) --}}
    @auth
        @if(Auth::user()->role === 'contributor')
            <div class="container mb-4 text-end">
                <a href="/create_article" class="btn btn-success" style="background-color: #f3ced4; border-color: #ffffff; color: rgb(144, 106, 127); font-weight: bold;">Create Article</a>
            </div>
        @endif
    @endauth

    {{-- ARTICLES GRID (skip the first if it was used as the hero) --}}
    <div class="container">
        <div class="row">
            @if($articles->count() > 1)
                @foreach ($articles->skip(1) as $article)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($article->body), 100, '...') }}
                                </p>
                                <p class="mb-1">
                                    <small class="text-muted">Start: {{ $article->start_date }}</small>
                                </p>
                                <p class="mb-1">
                                    <small class="text-muted">End: {{ $article->end_date }}</small>
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ url('/articles', ['id' => $article->article_id]) }}" 
                                       class="btn btn-sm mt-2"
                                       style="background-color: #dfbcc2; border-color: #FFC0CB; color: white; font-weight: bold;">
                                        Read More
                                    </a>
                                    {{-- Update/Delete for the article owner --}}
                                    @auth
                                        @if(Auth::user()->username === $article->contributor_username)
                                            <a href="{{ url('/update_article', ['id' => $article->article_id]) }}" 
                                               class="btn btn-secondary btn-sm mt-2">
                                                Update
                                            </a>
                                            <form method="post" 
                                            action="{{ url('/articles', ['id' => $article->article_id]) }}" 
                                            class="d-inline" 
                                            onsubmit="return confirm('Are you sure you want to delete this article?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mt-2"  style ="background-color: #bd6271;">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">
                                    By {{ $article->contributor_username }} 
                                    on {{ $article->create_date }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif($articles->count() === 1)
                {{-- Only one article total, already displayed in the hero --}}
                <div class="col-12">
                    <p class="text-center">No other articles available.</p>
                </div>
            @else
                {{-- No articles at all --}}
                <div class="col-12">
                    <p class="text-center">No articles available.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
