<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(){
        return view('user.loginadmin');
    }

    public function postLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Email và mật khẩu hợp lệ
        return redirect()->route('master.index')->with('success', 'Logged in successfully!');
    } else {
        // Email hoặc mật khẩu không hợp lệ
        return back()->withErrors([
            'email' => 'Email or password is invalid.',
        ])->withInput();
    }
}
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
