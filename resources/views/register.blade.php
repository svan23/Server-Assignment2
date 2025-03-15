@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="card p-4 shadow-lg" style="width: 22rem;">
            <h3 class="text-center mb-3">Register</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="/register">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Email (Username)</label>
                    <input type="email" name="username" id="username" class="form-control" required value="{{ old('username') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <small class="text-muted">
                        Minimum 8 characters, including uppercase, lowercase, number and special character.
                    </small>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required value="{{ old('first_name') }}">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required value="{{ old('last_name') }}">
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
@endsection