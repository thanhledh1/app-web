<?php

namespace App\Http\Controllers;

use App\Http\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public HomeService $homeService;


    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }
    public function index(Request $request)
    {
        $page =  $this->homeService->index($request);
        // dd($page);
        return view('home.index', [
            'sections' => $page->sessions,
            'menus' =>  $page->menus,
            'page' => $page

        ]);
    }
}
