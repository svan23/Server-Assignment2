@extends('layouts.master')
@section('title', 'Edit Article')
@section('content')
    <h1>Edit Article</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ url('/articles', ['id' => $article->article_id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $article->title) }}">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $article->body) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required value="{{ old('start_date', $article->start_date) }}">
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required value="{{ old('end_date', $article->end_date) }}">
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update Article</button>
            <a href="{{ route('index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection