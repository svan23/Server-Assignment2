@extends('layouts.master')
@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="card p-4 shadow-lg" style="width: 22rem;">
            <h3 class="text-center mb-3">Login</h3>

            <form method="post" action="/login">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
@endsection
