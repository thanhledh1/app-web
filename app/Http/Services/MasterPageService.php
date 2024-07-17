<?php

namespace App\Http\Services;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Section;
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

    public function updateMenu(MenuRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update([
            'title' => $request->title
        ]);
        return response()->json($menu);
    }
  
}
