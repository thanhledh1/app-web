<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    
    public function create()
    {
        return view('page.create');
    }
    public function store(Request $request)
    {
        $page = new Page();
        $page->name = $request->name;
        $page->domain = $request->domain;
        $page->user_id = Auth::id(); // Lưu ID của người dùng đã đăng nhập
        $file = $request->logo;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = 'admin/uploads/logo';
            $newImageName = $logo->getClientOriginalName();
            $newImageName = pathinfo($newImageName, PATHINFO_FILENAME) . '_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path($path), $newImageName);
            $page->logo = $newImageName;
        }
        $page->save();
        return redirect()->route('master.index');
    }
    
}
