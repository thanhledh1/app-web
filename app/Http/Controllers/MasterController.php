<?php

namespace App\Http\Controllers;

use App\Http\Services\MasterPageService;
use Illuminate\Http\Request;


class MasterController extends Controller
{
    public MasterPageService $masterpageService;


    public function __construct(MasterPageService $masterpageService)
    {
        $this->masterpageService = $masterpageService;
    }

    public function index(Request $request)
    {
        $page = $this->masterpageService->getLastPage();
        $sections = $this->masterpageService->sessionAll();
        $menus = $this->masterpageService->menuOderBy();

        if ($request->session()->has('success')) {
            return view('master', compact('page', 'menus', 'sections'));
        } 
            return redirect()->route('page.index'); 
    }

    public function updateMenu(Request $request, $id)
    {
        $menu = $this->masterpageService->updateMenu($request, $id);
        return response()->json(['success' => 'Menu item updated successfully.', 'menu' => $menu]);
    }


    public function updateOrder(Request $request)
    {
        $this->masterpageService->updateMenuOrder($request);
        return response()->json(['success' => true]);
    }
}
