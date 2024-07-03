<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    //
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
            return response()->json(['message' => 'Sign Up Success!']);
        } catch (\Exception $e) {
            // Rollback transaction nếu có lỗi
            DB::rollback();

            // Trả về thông báo lỗi (nếu cần)
            return response()->json(['message' => 'Failed to add selected menus to intermediate table.'], 500);
        }
    }
}
