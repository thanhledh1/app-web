<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;


class UserController extends Controller
{
    public UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index() 
    {
        $users =  $this->userService->index();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
         $this->userService->store($request);
        return redirect()->route('login')->with('success', 'Sign Up Success!');
    }

    public function edit($id)
    {
        $user = $this->userService->findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
        return redirect()->route('users.index');
    }

    public function update(UserRequest $request, $id)
    {
      $this->userService->update($request, $id);
        return redirect()->route('users.index')->with('success', 'Sửa thành công!');
    }

    public function show($id)
    {
        $user = $this->userService->show($id);
        return view('user.show', compact('user'));
    }
}
