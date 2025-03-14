@extends('layouts.master')
@section('title', 'Articles List')
@section('content')
    <h1>Articles</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        @if($articles->count())
            @foreach ($articles as $article)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">{{ $article->title }}</h2>
                            <p><strong>Start Date:</strong> {{ $article->start_date }}</p>
                            <p><strong>End Date:</strong> {{ $article->end_date }}</p>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($article->body), 100, '...') }}</p>
                            <a href="{{ url('/article/display', ['id' => $article->article_id]) }}" class="btn btn-primary">Read More</a>
                            @if(session('username') && session('username') === $article->contributor_username)
                                <a href="{{ url('/article/update', ['id' => $article->article_id]) }}" class="btn btn-secondary">Update</a>
                                <a href="{{ url('/article/delete_process', ['id' => $article->article_id]) }}" class="btn btn-danger">Delete</a>
                            @endif
                        </div>
                        <div class="card-footer">
                            <small>By {{ $article->contributor_username }} on {{ $article->create_date }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">No articles available for the selected date range.</p>
        @endif
    </div>
@endsection