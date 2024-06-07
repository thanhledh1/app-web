<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $file = $request->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'admin/uploads/user';
            $newImageName = $image->getClientOriginalName();
            $newImageName = pathinfo($newImageName, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $newImageName);
            $user->image = $newImageName;
        }
        $user->save();
        return redirect()->route('login')->with('success', 'Sign Up Success!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }

  

    public function update(UserRequest $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $get_image = $request->image;
            if ($get_image) {
                $path = 'admin\uploads\user' . $user->image;
                if (file_exists($path)) {
                    unlink($path);
                }
                $path = 'admin\uploads\user';
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);
                $user->image = $new_image;
                $data['user_image'] = $new_image;
            }
            $user->save();
            return redirect()->route('user.index')->with('success', 'Sửa thành công!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }
    }
