<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Http\Services\SectionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SectionController extends Controller
{
    //

    public SectionService $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function index(): View
    {
        $sections = $this->sectionService->index();
        return view('section.index', compact('sections'));
    }

    public function create(): View
    {
        return view('section.create');
    }

    public function edit($id): View
    {
        $section = $this->sectionService->findOrFail($id);
        return view('section.edit', compact('section'));
    }

    public function destroy($id):RedirectResponse
    {
        $this->sectionService->destroy($id);
        return redirect()->route('section.index');
    }

    public function store(SectionRequest $request):RedirectResponse
    {
        $this->sectionService->store($request);
        return redirect()->route('section.index');
    }

    public function update(SectionRequest $request, $id):RedirectResponse
    {
        $this->sectionService->update($request, $id);
        return redirect()->route('section.index')->with('success', 'Sửa thành công!');
    }

    public function updateServices(Request $request): JsonResponse
    {
        $result = $this->sectionService->updateServices($request);
        return response()->json($result);
    }

    public function updateImage(Request $request): JsonResponse
    {
        $result = $this->sectionService->updateImage($request);
        return response()->json($result);
    }

    public function updateImageAbout(Request $request): JsonResponse
    {
        $result = $this->sectionService->updateImageAbout($request);
        return response()->json($result);
    }

    public function updateImageTeam(Request $request): JsonResponse
    {
        $result = $this->sectionService->updateImageAbout($request);
        return response()->json($result);
    }
}
