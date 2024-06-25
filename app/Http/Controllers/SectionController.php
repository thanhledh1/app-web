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
        return view('section.index', compact('sections', 'section'));
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
        $section = new Section();
        $section->name = $request->name;
        $section->filename = $request->filename;
        $section->cos = $request->cos; // COS
        $section->text_1 = $request->text_1;
        $section->text_2 = $request->text_2;
        $section->text_3 = $request->text_3;
        $section->text_4 = $request->text_4;
        $section->text_5 = $request->text_5;
        $section->text_6 = $request->text_6;
        $section->text_7 = $request->text_7;
        $section->text_8 = $request->text_8;
        $section->text_9 = $request->text_9;
        $section->text_10 = $request->text_10;
        // Array of image columns in the database
        $imageColumns = ['image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7', 'image_8']; // Add more columns as needed
        $path = 'admin/uploads/section';
        foreach ($imageColumns as $imageColumn) {
            if ($request->hasFile($imageColumn)) {
                $image = $request->file($imageColumn);
                $newImageName = $image->getClientOriginalName();
                $newImageName = pathinfo($newImageName, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path($path), $newImageName);
                $section->$imageColumn = $newImageName;
            }
        }
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
