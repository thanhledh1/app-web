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
            // Hiển thị view của MasterController@index
            return view('master', compact('page', 'menus', 'sections'));
        } else {
            // Nếu không có session 'success', chuyển hướng hoặc xử lý theo yêu cầu
            return redirect()->route('page.index'); // Ví dụ chuyển hướng về route 'home'
        }
    }

    public function update(Request $request, $id)
    {
        $menu = $this->masterpageService->updateMenu($request, $id);
        return response()->json(['success' => 'Menu item updated successfully.', 'menu' => $menu]);
    }


    public function updateOrder(Request $request)
    {
        $this->masterpageService->updateMenuOrder($request);
        return response()->json(['success' => true]);
    }

    public function addSelectedMenusToIntermediateTable(Request $request)
    {
        $result = $this->masterpageService->addSelectedMenusAndSections($request);

        if ($result) {
            return redirect()->route('login')->with('success', 'Sign Up Success!');
        } else {
            return response()->json(['message' => 'Failed to add selected menus to intermediate table.'], 500);
        }
    }
}
