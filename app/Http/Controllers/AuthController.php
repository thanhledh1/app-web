<?php

namespace App\Http\Controllers;

use App\Http\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public AuthService $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function login()
    {
        return view('user.loginadmin');
    }

    public function postLogin(Request $request)
    {
        $result = $this->authService->login($request);

        if ($result['success']) {
            return redirect()->route('page.create')->with('success', 'Logged in successfully!');
        }
        return back()->withErrors([
            'email' => $result['message'],
        ])
            ->withInput();
    }
    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}
