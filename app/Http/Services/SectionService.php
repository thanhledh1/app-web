<?php

namespace App\Http\Services;

use App\Http\Requests\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionService
{
    public function index()
    {
        return Section::all();
    }
    public function findOrFail($id):Section
    {
        return Section::findOrFail($id);
    }
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();
    }

    public function store(SectionRequest $request)
    {
        $validatedData = $request->validated();
        // Array of image columns in the database
        $imageColumns = [
            'image_1', 'image_2', 'image_3', 'image_4',
            'image_5', 'image_6', 'image_7', 'image_8'
        ];

        $path = 'admin/uploads/section';

        foreach ($imageColumns as $imageColumn) {
            if ($request->hasFile($imageColumn)) {
                $image = $request->file($imageColumn);
                $newImageName = $image->getClientOriginalName();
                $newImageName = pathinfo($newImageName, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path($path), $newImageName);
                $validatedData[$imageColumn] = $newImageName;
            }
        }

        // Tạo một đối tượng Section mới bằng phương thức create
        $section = Section::create($validatedData);

        return response()->json($section, 201);
    }

    public function update(SectionRequest $request, $id)
    {
        $section = Section::findOrFail($id); 
        // Lấy dữ liệu hợp lệ từ Request
        $validatedData = $request->validated();
       
        $section->update($validatedData);
        return response()->json($section, 200); 
    }

    public function updateServices(Request $request)
    { {
            // Lấy section cần cập nhật theo ID
            $section = Section::find($request->input('id'));
            if ($section) {
                // Lấy field và value từ request
                $field = $request->input('field');
                $value = $request->input('value');

                // Cập nhật trường tương ứng
                $section->$field = $value;
                $section->save();
                return ['success' => true, 'message' => 'Content updated successfully'];
            }
            return ['success' => false, 'message' => 'Failed to update content'];
        }
    }
    public function updateImage(Request $request)
    {
        if ($request->hasFile('image')) {
            // Lấy section cần cập nhật theo ID
            $section = Section::find($request->id);
            if ($section) {
                // Lấy field từ request
                $field = $request->field;

                // Xử lý upload ảnh
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('user/assets/img/portfolio'), $filename);

                // Cập nhật trường tương ứng
                $section->$field = $filename;
                $section->save();

                return ['success' => true];
            }
        }

        return ['success' => false];
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
