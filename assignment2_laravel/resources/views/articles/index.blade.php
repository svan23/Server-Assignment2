@extends('layouts.master')
@section('title', 'Articles')
@section('content')
    <div class="py-5 text-center mb-4" style="background: url('https://i.pinimg.com/736x/e3/d9/b0/e3d9b046920035ef909b1a5f37b92b5b.jpg') no-repeat center center; background-size: cover; color: white;">
        <div style="background: rgba(0, 0, 0, 0.5); padding: 2rem;">
            <h1 class="display-4 arizonia-text">Latest Articles</h1>
            <p class="lead arizonia-text">Discover engaging content from our community!</p>
        </div>
    </div>
    
    {{-- Display error messages (still using session for flash messages) --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Only allow contributors to see the Create Article button --}}
    @auth
        @if(Auth::user()->role === 'contributor')
            <div class="mb-4 text-end">
                <a href="/articles/create" class="btn btn-success">Create Article</a>
            </div>
        @endif
    @endauth

    <div class="row">
        @if($articles->count())
            @foreach ($articles as $article)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
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
                            <a href="{{ url('/articles', ['id' => $article->article_id]) }}" class="btn btn-primary btn-sm mt-2">Read More</a>
                            
                            {{-- Only allow the article creator to see update/delete options --}}
                            @auth
                                @if(Auth::user()->username === $article->contributor_username)
                                    <a href="{{ url('/article/update', ['id' => $article->article_id]) }}" class="btn btn-secondary btn-sm mt-2">Update</a>
                                    <form method="post" action="{{ url('/article/delete_process', ['id' => $article->article_id]) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                By {{ $article->contributor_username }} on {{ $article->create_date }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">No articles available for the selected date range.</p>
            </div>
        @endif
    </div>
@endsection