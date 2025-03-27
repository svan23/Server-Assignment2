<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function adminIndex()
    {
        // Get the currently authenticated user using Auth and ensure they are admin.
        $admin = Auth::user();
        if (!$admin || $admin->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function adminUpdate(Request $request, $id)
    {
        // Get the currently authenticated user using Auth and ensure they are admin.
        $admin = Auth::user();
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
        // ...
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ...
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ...
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // ...
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // ...
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // ...
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // ...
    }
}
