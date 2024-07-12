<?php

namespace App\Http\Services;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuService
{
    public function index(): Menu
    {
        return Menu::paginate(5);
    }

    public function findOrFail($id): Menu
    {
        return Menu::findOrFail($id);
    }

    public function destroy($id) : JsonResponse
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
    
        return response()->json(['success' => true, 'message' => 'Menu item deleted successfully.'], 200);
    }

    public function store(MenuRequest $request)
    {
        $menu = new Menu();
        $menu->fill($request->all());
        // only
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
        $menu->fill($request->all());
        $menu->save();
    }
    public function show($id)
    {
        return Menu::find($id);
    }
}
