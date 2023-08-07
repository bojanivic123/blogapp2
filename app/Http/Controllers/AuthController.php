<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterPage()
    {
        return view('pages.auth.register');
    }

    public function showLoginPage()
    {
        return view('pages.auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:32|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:5|max:255|confirmed',
        ]);
        User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);
        return redirect('/login')->with('status' . 'Account created');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect('/login')->withErrors('You are already logged in.');
        }
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/')->with('status', 'You are logged in.');
        }
        return redirect('/login')->withErrors('Invalid data');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login')->with('status', 'You are logged out.');
    }
}

