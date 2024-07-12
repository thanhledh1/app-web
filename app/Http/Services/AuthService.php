<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthService
{
    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Email và mật khẩu hợp lệ
            return ['success' => true];
        }  
            // Email hoặc mật khẩu không hợp lệ
            return ['success' => false, 'message' => 'Email or password is invalid.'];
        
    }
    public function logout()
    {
        Auth::logout();
    }
}
