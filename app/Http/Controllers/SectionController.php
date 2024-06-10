<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //
    public function index()
    {
        $sections = Section::all();
        return view('section.index', compact('sections'));
    }
    public function create()
    {

        return view('section.create');
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('section.edit', compact('section'));
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();
        return redirect()->route('section.index');
    }
    public function store(Request $request)
    {
        $section = new section();
        $section->title = $request->title;
        $section->url = $request->url;
        $section->position = $request->position;
        $section->active = $request->active;
        $section->save();
        return redirect()->route('section.index');
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');

        foreach ($order as $item) {
            $section = section::find($item['id']);
            $section->position = $item['position'];
            $section->save();
        }

        return response()->json(['success' => 'Order updated successfully']);
    }
    public function update(Request $request, $id)
    {
        $section = section::find($id);
        $section->title = $request->title;
        $section->url = $request->url;
        $section->position = $request->position;
        $section->active = $request->active;
        $section->save();
        return redirect()->route('section.index')->with('success', 'Sửa thành công!');
    }
}
