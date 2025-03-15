<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = User::where('username', operator: $credentials['username'])->first();

        if ($user && password_verify($credentials['password'], $user->password)) {
            session(['username' => $user->username]);
            return redirect()->route('index');
        }

        return redirect()->back()->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        return redirect()->route('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
