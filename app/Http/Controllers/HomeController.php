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
        try {
            $page = $this->homeService->index($request);
            return view('home.index', [
                'sections' => $page->sessions,
                'menus' => $page->menus,
                'page' => $page
            ]);
        } catch (\Exception $e) {
            // Log the exception if needed
            \Log::error('Error fetching home page data: ' . $e->getMessage());
    
            // Redirect to a different route, for example 'error.page'
            return redirect()->route('error.page')->with('error', 'There was an error processing your request.');
        }
    }
    
}
