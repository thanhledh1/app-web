<?php

namespace App\Http\Services;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;

class MasterPageService
{
    public function getLastPage(): Page
    {
        return Page::where('user_id', Auth::id())
            ->latest('created_at')
            ->first();
    }

    public function sessionAll()
    {
        return Section::all();
    }

    public function menuOderBy(): Menu
    {
        return Menu::orderBy('position')
            ->get();
    }

    public function menufindOrFail($id): Menu
    {
        return Menu::findOrFail($id);
    }

    public function updateMenu(Request  $request, $id): Menu
    {
        $menu = Menu::findOrFail($id);
        $menu->title = $request->title;
        $menu->save();
        return $menu;
    }
    public function updateMenuOrder(Request $request): JsonResponse
    {
        $order = $request->input('order');
        DB::beginTransaction();
        try {
            foreach ($order as $index => $id) {
                $menu = Menu::find($id);
                if (is_null($menu)) {
                    continue;
                }
                $menu->position = $index;
                $menu->save();
            }
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
