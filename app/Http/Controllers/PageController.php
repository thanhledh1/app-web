<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //
      
    public function index()
    {
        $pages = Page::with(['user', 'menus', 'sessions'])->paginate(7);;

        // $pages= Page::paginate(7);
        return view('page.index', compact('pages'));
    }


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
        if ($page) {
            return redirect()->route('master.index')->with('success', 'Page created successfully!');
        } else {
            return back()->withInput()->with('error', 'Failed to create page.');
        }
    }

    public function edit($id)
    {
      
        return view('page.edit', compact('menu'));
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('page.index');
    }

   
    

    public function update(Request $request, $id)
    {
        
        return redirect()->route('page.index')->with('success', 'Sửa thành công!');
    }

    public function show($id)
    {
        try {
            // Tìm trang với các liên kết đã được load trước
            $page = Page::with(['user', 'menus', 'sessions'])->findOrFail($id);
    
            // Trả về view hiển thị trang với dữ liệu được truyền vào
            return view('page.show', compact('page'));
        } catch (ModelNotFoundException $e) {
            // Xử lý nếu không tìm thấy trang và quay lại trang trước đó
            return back()->with('error', 'Page not found.');
        } catch (\Exception $e) {
            // Xử lý ngoại lệ khác nếu có và quay lại trang trước đó
            return back()->with('error', 'Something went wrong.');
        }
    }

    
}
