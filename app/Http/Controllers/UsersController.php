<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();
    
        if ($user && password_verify($credentials['password'], $user->password)) {
            if (! $user->is_approved) {
                return redirect()->back()->with('error', 'Account not approved by the admin.');
            }
            session([
                'username'   => $user->username,
                'role'       => $user->role,
                'first_name' => $user->first_name,
                'last_name'  => $user->last_name,
            ]);
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
        $request->validate([
            'username'   => 'required|email|unique:users,username',
            'password'   => [
                'required',
                'bail', // stop on first failure
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255'
        ], [
            'password.min'   => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);

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

    public function adminIndex()
    {
        // Only allow admin users to access this page.
        $admin = User::where('username', session('username'))->first();
        if (!$admin || $admin->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function adminUpdate(Request $request, $id)
    {
        // Only allow admin users to update user accounts.
        $admin = User::where('username', session('username'))->first();
        if (!$admin || $admin->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $validated = $request->validate([
             'is_approved' => 'required|boolean',
             'role'        => 'required|in:admin,contributor'
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->back()->with('success', 'User updated successfully.');
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
