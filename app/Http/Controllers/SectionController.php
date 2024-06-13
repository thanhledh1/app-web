<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    
    public function updateServices(Request $request)
    {
        // Lấy section cần cập nhật theo ID
        $section = Section::find($request->input('id'));
        if ($section) {
            // Lấy field và value từ request
            $field = $request->input('field');
            $value = $request->input('value');

            // Cập nhật trường tương ứng
            $section->$field = $value;
            $section->save();
            return response()->json(['success' => true, 'message' => 'Content updated successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Failed to update content']);
    }

    public function updateImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $section = Section::find($request->id);
            $field = $request->field;

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('user/assets/img/portfolio'), $filename);

            $section->$field = $filename;
            $section->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function updateImageAbout(Request $request)
    {
        if ($request->hasFile('image1')) {
            $section = Section::find($request->id);
            $field = $request->field;

            $file = $request->file('image1');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('user/assets/img/about'), $filename);

            $section->$field = $filename;
            $section->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
  
    public function updateImageTeam(Request $request)
    {
        if ($request->hasFile('image2')) {
            $section = Section::find($request->id);
            $field = $request->field;

            $file = $request->file('image2');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('user/assets/img/team'), $filename);

            $section->$field = $filename;
            $section->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
    
}
