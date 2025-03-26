<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
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

        $user = User::create([
            'username'      => $request->username,
            'password'      => password_hash($request->password, PASSWORD_DEFAULT),
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'is_approved'   => false,
            'role'          => 'contributor'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('index', absolute: false));
    }
}
