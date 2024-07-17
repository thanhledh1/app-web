<?php

namespace App\Http\Services;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageService
{
    public function index()
    {
        return Page::with(['user', 'menus', 'sessions'])->paginate(7);;
    }

    public function store(PageRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::id();
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = 'admin/uploads/logo';
            $newImageName = pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path($path), $newImageName);
            $validatedData['logo'] = $newImageName;
        }
        $page = Page::create($validatedData);
        return response()->json($page, 201);
        
    }

    public function findOrFail($id)
    {
        return Page::findOrFail($id);
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
    }

    public function show($id)
    {
        return Page::with(['user', 'menus', 'sessions'])->findOrFail($id);
    }

    public function update(PageRequest $request, $id)
    {
        $page = Page::find($id);
    
        $data = $request->validated();
        $data['user_id'] = Auth::id();
    
        $get_image = $request->logo;
        if ($get_image) {
            $path = 'admin/uploads/logo/';
            $old_image = $path . $page->logo;
            if (file_exists($old_image)) {
                unlink($old_image);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $data['logo'] = $new_image;
        }
    
        $page->update($data);
    }
    
}
