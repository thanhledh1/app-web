<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function index()
    {
        return User::paginate(7);
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $file = $request->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'admin/uploads/user';
            $newImageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $newImageName);
            $user->image = $newImageName;
        }
        
        $user->save();

        return $user;
    }
    public function findOrFail($id)
    {
        return User::findOrFail($id);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
    public function show($id)
    {
        return User::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $get_image = $request->image;
        if ($get_image) {
            $path = 'admin/uploads/user/' . $user->image; // Fixed the directory separator
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'admin/uploads/user'; // Fixed the directory separator
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $user->image = $new_image;
        }

        $user->save();
        return redirect()->route('users.index')->with('success', 'Sửa thành công!');
    }
}