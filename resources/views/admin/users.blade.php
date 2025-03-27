@extends('layouts.master')
@section('title', 'Manage Users')
@section('content')
    <h1>Manage Users</h1>

    {{-- Display flash success messages using a Breeze component --}}
    <x-auth-session-status class="mb-4 alert alert-success" :status="session('success')" />

    <table class="table">
       <thead>
          <tr>
             <th>ID</th>
             <th>Username</th>
             <th>Approved</th>
             <th>Role</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          @foreach($users as $user)
             <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->is_approved ? 'Yes' : 'No' }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                   <form method="post" action="/admin/users/{{ $user->id }}">
                      @csrf
                      <select name="is_approved" class="form-select form-select-sm d-inline-block" style="width: 120px;">
                         <option value="0" {{ !$user->is_approved ? 'selected' : '' }}>Not Approved</option>
                         <option value="1" {{ $user->is_approved ? 'selected' : '' }}>Approved</option>
                      </select>
                      <select name="role" class="form-select form-select-sm d-inline-block" style="width: 120px;">
                         <option value="contributor" {{ $user->role === 'contributor' ? 'selected' : '' }}>Contributor</option>
                         <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                      </select>
                      <button type="submit" class="btn btn-primary btn-sm">Update</button>
                   </form>
                </td>
             </tr>
          @endforeach
       </tbody>
    </table>
@endsection