<?php

namespace App\Http\Services;

use App\Models\Page;
use Illuminate\Http\Request;


class HomeService
{
    public function index(Request $request) : Page
    {
        return Page::where('domain', $request->getHost())
        ->with('sessions')
        ->with('menus')
        ->first();
    }

   
}

