<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
      
    public MenuService $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menus = $this->menuService->index();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function edit($id)
    {
        $menu = $this->menuService->findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function destroy($id)
    {
        $this->menuService->destroy($id);
        return redirect()->route('menu.index');
    }

    public function store(MenuRequest $request)
    {
        $this->menuService->store($request);
        return redirect()->route('menu.index');
    }

    public function updateOrder(Request $request)
    {
        $this->menuService->updateOrder($request);
        return response()->json(['success' => 'Order updated successfully']);
    }

    public function update(Request $request, $id)
    {
        $this->menuService->update($request, $id);
        return redirect()->route('menu.index')->with('success', 'Sửa thành công!');
    }

    public function show($id)
    {
        $menu = $this->menuService->show($id);
        return view('menu.show', compact('menu'));
    }

    

}
