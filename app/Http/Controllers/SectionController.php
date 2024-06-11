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
        $section = Section::findOrFail(8);
        return view('section.index', compact('sections','section'));
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
        $section = section::findOrFail($id);
        $section->delete();
        return redirect()->route('section.index');
    }
    public function store(Request $request)
    {
        $section = new section();
        $section->name = $request->name;
        $section->html_content = $request->html_content;
        $section->save();
        return redirect()->route('section.index');
    }


    public function update(Request $request, $id)
    {
        $section = section::find($id);
        $section->name = $request->name;
        $section->html_content = $request->html_content;
        $section->save();
        return redirect()->route('section.index')->with('success', 'Sửa thành công!');
    }
    

}
