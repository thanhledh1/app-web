<?php

namespace App\Http\Services;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $menu->update([
            'title' => $request->title
        ]);
        return response()->json($menu);
    }
  
}
