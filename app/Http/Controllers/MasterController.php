<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //

    public function index()
    {
        $sections = Section::all();
        $menus = Menu::orderBy('position')->get();
        // dd($sections);
        return view('master', compact('menus', 'sections'));
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
}
