<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Services\PageService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public PageService $pageService;
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function index()
    {
        $pages = $this->pageService->index();
        return view('page.index', compact('pages'));
    }

    public function create()
    {
        return view('page.create');
    }

    public function store(PageRequest $request)
    {
        $page = $this->pageService->store($request);
        if ($page) {
            return redirect()->route('master.index')->with('success', 'Page created successfully!');
        } else {
            return back()->withInput()->with('error', 'Failed to create page.');
        }
    }

    public function edit($id)
    {
        $page = $this->pageService->findOrFail($id);
        return view('page.edit', compact('page'));
    }

    public function destroy($id)
    {
        $this->pageService->destroy($id);
        return redirect()->route('page.index');
    }

    public function update(Request $request, $id)
    {
        $this->pageService->update($request,$id);

        return redirect()->route('page.index')->with('success', 'Sửa thành công!');
    }

    public function show($id)
    {
        try {
            $page = $this->pageService->show($id);
            return view('page.show', compact('page'));
        } catch (ModelNotFoundException $e) {
            // Xử lý nếu không tìm thấy trang và quay lại trang trước đó
            return back()->with('error', 'Page not found.');
        } catch (\Exception $e) {
            // Xử lý ngoại lệ khác nếu có và quay lại trang trước đó
            return back()->with('error', 'Something went wrong.');
        }
    }

    
}
