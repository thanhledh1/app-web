<?php

namespace App\Http\Services;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class PageService
{
    public function index()
    {
        return Page::with(['user', 'menus', 'sessions'])->paginate(7);;
    }

    public function store(PageRequest $request)
    {
        $page = new Page();
        $page->name = $request->name;
        $page->domain = $request->domain;
        $page->user_id = Auth::id(); // Lưu ID của người dùng đã đăng nhập

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = 'admin/uploads/logo';
            $newImageName = pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path($path), $newImageName);
            $page->logo = $newImageName;
        }

        $page->save();
        return $page;
    }

    public function findOrFail($id)
    {
        return Page::findOrFail($id);
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
    }

    public function show($id)
    {
        return Page::with(['user', 'menus', 'sessions'])->findOrFail($id);
    }
}