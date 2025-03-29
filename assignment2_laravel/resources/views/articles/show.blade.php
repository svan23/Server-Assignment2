@extends('layouts.master')
@section('title', $article->title)
@section('content')
    <h1>{{ $article->title }}</h1>
    <p><strong>Start Date:</strong> {{ $article->start_date }}</p>
    <p><strong>End Date:</strong> {{ $article->end_date }}</p>
    <div>{!! $article->body !!}</div>
    <p><small>By {{ $article->contributor_name }} on {{ $article->create_date }}</small></p>
    <a href="{{ url('/') }}" class="btn btn-primary"
        style="background-color: #dfbcc2; border-color: #ffffff; color: white; font-weight: bold;">Back to Articles</a>
@endsection
