<?php

namespace App\Http\Services;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $page->name = $request->name;
        $page->domain = $request->domain;
        $page->user_id = Auth::id(); // Lưu ID của người dùng đã đăng nhập

        $get_image = $request->logo;
        if ($get_image) {
            $path = 'admin/uploads/logo/'; // Thêm dấu gạch chéo ở cuối đường dẫn
            $old_image = $path . $page->logo;
            if (file_exists($old_image)) {
                unlink($old_image);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME); // Lấy tên file mà không cần explode
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $page->logo = $new_image;
        }

        $page->save();
    }
}
