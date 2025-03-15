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


    public function register(Request $request)
    {
        // Validate the registration data
        $request->validate([
            'username'   => 'required|email|unique:users,username',
            'password'   => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255'
        ]);

        // Create the new user (using password_hash for simplicity; you can also use bcrypt helper)
        User::create([
            'username'      => $request->username,
            'password'      => password_hash($request->password, PASSWORD_DEFAULT),
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'is_approved'   => false,
            'role'          => 'contributor'
        ]);

        return redirect('/login')->with('success', 'Registration successful. Please login.');
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
