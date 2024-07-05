<?php

namespace App\Http\Services;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterPageService
{
    public function getLastPage()
    {
        return Page::where('user_id', Auth::id())
            ->latest('created_at')
            ->first();
    }

    public function sessionAll()
    {
        return Section::all();
    }

    public function menuOderBy()
    {
        return Menu::orderBy('position')
            ->get();
    }

    public function menufindOrFail($id)
    {
        return Menu::findOrFail($id);
    }

    public function updateMenu(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->title = $request->title;
        $menu->save();
        return $menu;
    }
    public function updateMenuOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            $menu = Menu::find($id);
            if ($menu) {
                $menu->position = $index;
                $menu->save();
            }
        }
        return true;
    }

    
   
    public function addSelectedMenusAndSections(Request $request)
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

            return true;
        } catch (\Exception $e) {
            // Rollback transaction nếu có lỗi
            DB::rollback();

            return false;
        }
    }
}
