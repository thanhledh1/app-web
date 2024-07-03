<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuPage;
use App\Models\Page;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    //



    // public function index()
    // {
    //     $pages = Page::where('user_id', Auth::id())->get(); // Lấy các trang của người dùng đang đăng nhập
    //     $sections = Section::all();
    //     $menus = Menu::orderBy('position')->get();

    //     dd($pages);
    //     return view('master', compact('pages', 'menus', 'sections'));
    // }

    public function index( Request $request)
    {
        $page = Page::where('user_id', Auth::id())->latest('created_at')->first(); // Lấy trang mới nhất theo created_at
        $sections = Section::all();
        $menus = Menu::orderBy('position')->get();
        // dd($latestPage,$menus,$sections);
        // return view('master', compact('page', 'menus', 'sections'));
        if ($request->session()->has('success')) {
            // Hiển thị view của MasterController@index
            return view('master', compact('page', 'menus', 'sections'));
        } else {
            // Nếu không có session 'success', chuyển hướng hoặc xử lý theo yêu cầu
            return redirect()->route('page.index'); // Ví dụ chuyển hướng về route 'home'
        }
    }


    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->title = $request->title;
        $menu->save();
        return response()->json(['success' => 'Menu item updated successfully.']);
    }


    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            $menu = Menu::find($id);
            $menu->position = $index;
            $menu->save();
        }
        return response()->json(['success' => true]);
    }

    public function addSelectedMenusToIntermediateTable(Request $request)
    {
        $pageId = $request->input('page_id');
        $menuIds = $request->input('menu_id');
        $sectionIds = $request->input('session_id');


        try {
            // Bắt đầu transaction
            DB::beginTransaction();

            foreach ($menuIds as $menuId) {
                // Thêm từng menu vào bảng trung gian
                DB::table('menus_page')->insert([
                    'page_id' => $pageId,
                    'menu_id' => $menuId,
                ]);
            }

            foreach ($sectionIds as $sectionId) {
                // Thêm từng section vào bảng trung gian
                DB::table('section_page')->insert([
                    'page_id' => $pageId,
                    'session_id' => $sectionId,
                ]);
            }

            // Commit transaction
            DB::commit();

            // Trả về thông báo thành công (nếu cần)
            return redirect()->route('login')->with('success', 'Sign Up Success!');
        } catch (\Exception $e) {
            // Rollback transaction nếu có lỗi
            DB::rollback();

            // Trả về thông báo lỗi (nếu cần)
            return response()->json(['message' => 'Failed to add selected menus to intermediate table.'], 500);
        }
    }
}
