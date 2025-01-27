<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login(User::where('email', $validated['email'])->first());

        return redirect()->route('dashboard');
    }

    public function showDashboard() 
    {
        return view('auth.dashboard', ['posts' => Auth::user()->posts]);
    }    

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No account found with this email address.'])
                        ->withInput($request->only('email')); 
        }

        if (Auth::attempt($credentials)) {
            Auth::login($user);

            return redirect()->intended(route('dashboard')); 
        }

        return back()->withErrors(['password' => 'The provided password is incorrect.'])
                    ->withInput($request->only('email'));
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('register.show');
    }
}
