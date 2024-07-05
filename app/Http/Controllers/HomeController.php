<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $page = Page::where('domain', $request->getHost())
            ->with('sessions')
            ->first();

        return view('home.index', ['sections' => $page->sessions]);
    }
}
