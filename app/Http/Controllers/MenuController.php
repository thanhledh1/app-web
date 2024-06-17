<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index()
    {
        $menus = Menu::paginate(5);
        return view('menu.index', compact('menus'));
    }
    public function create()
    {

        return view('menu.create');
    }
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menu.index');
    }
    public function store(MenuRequest $request)
    {
        $menu = new Menu();
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->position = $request->position;
        $menu->active = $request->active;
        $menu->save();
        return redirect()->route('menu.index');
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');

        foreach ($order as $item) {
            $menu = Menu::find($item['id']);
            $menu->position = $item['position'];
            $menu->save();
        }

        return response()->json(['success' => 'Order updated successfully']);
    }
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->position = $request->position;
        $menu->active = $request->active;
        $menu->save();
        return redirect()->route('menu.index')->with('success', 'Sửa thành công!');
    }
    public function show($id){
        $menu = Menu::find($id);
        return view('menu.show', compact('menu'));
    }
}
