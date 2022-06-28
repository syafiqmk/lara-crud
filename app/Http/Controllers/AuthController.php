<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{   
    // login view
    public function index() {
        return view('auth.index', ['title' => 'Login']);
    }

    // login process
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('');
        }

        return back()->with('loginError', 'Login Error! Check Your Email & Password.');
    }

    // registration view
    public function register() {
        return view('auth.register', ['title' => 'Registration']);
    }

    // registration process
    public function registerProcess(Request $request) {
        $credentials = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        User::create($credentials);
        return redirect('/login')->with('registerSuccess', 'Registration Successful! Please Login!');
    }

    // logout
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
