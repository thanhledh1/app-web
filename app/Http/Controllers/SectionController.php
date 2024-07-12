<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Http\Services\SectionService;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //

    public SectionService $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function index()
    {
        $sections = $this->sectionService->index();
        return view('section.index', compact('sections'));
    }

    public function create()
    {
        return view('section.create');
    }

    public function edit($id)
    {
        $section = $this->sectionService->findOrFail($id);
        return view('section.edit', compact('section'));
    }

    public function destroy($id)
    {
        $this->sectionService->destroy($id);
        return redirect()->route('section.index');
    }

    public function store(SectionRequest $request)
    {
        $this->sectionService->store($request);
        return redirect()->route('section.index');
    }

    public function update(SectionRequest $request, $id)
    {
        $this->sectionService->update($request, $id);
        return redirect()->route('section.index')->with('success', 'Sửa thành công!');
    }

    public function updateServices(Request $request)
    {
        $result = $this->sectionService->updateServices($request);
        return response()->json($result);
    }

    public function updateImage(Request $request)
    {
        $result = $this->sectionService->updateImage($request);
        return response()->json($result);
    }

    public function updateImageAbout(Request $request)
    {
        $result = $this->sectionService->updateImageAbout($request);
        return response()->json($result);
    }

    public function updateImageTeam(Request $request)
    {
        $result = $this->sectionService->updateImageAbout($request);
        return response()->json($result);
    }
}
