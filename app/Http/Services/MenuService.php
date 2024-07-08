<?php

namespace App\Http\Services;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuService
{
    public function index()
    {
        return Menu::paginate(5);
    }

    public function findOrFail($id)
    {
        return Menu::findOrFail($id);
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
    }

    
    public function store(MenuRequest $request)
    {
        $menu = new Menu();
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->position = $request->position;
        $menu->active = $request->active;
        $menu->save();
    }
    
    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $item) {
            $menu = Menu::find($item['id']);
            $menu->position = $item['position'];
            $menu->save();
        }
    }
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->position = $request->position;
        $menu->active = $request->active;
        $menu->save();
    }
    public function show($id)
    {
        return Menu::find($id);
    }


}