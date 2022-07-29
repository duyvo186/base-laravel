<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Service\Category\CategoryService;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.category.list', [
            'title' => __('text.category.title.index'),
            'categories' => $this->categoryService->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.category.add', [
            'title' => __('text.category.title.create'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        $result = $this->categoryService->create($request);
        if ($result) {
            response()->json([
                'success' => [
                    'createSuccess' => 'Create Product Success',
                ],
            ]);
            return redirect()->route('admin.category.index');
        }
        return redirect()->back();
    }


    public function show($id)
    {
        return view('admin.category.edit', [
            'title' => __('text.category.title.edit'),
            'categories' => $this->categoryService->show($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update($categoryId, CreateCategoryRequest $request)
    {
        $result = $this->categoryService->update($request, $categoryId);
        if ($result) {
            response()->json([
                'success' => [
                    'categorySuccess' => 'Update Success'
                ],
                'result' => $result,
            ]);
            return redirect()->route('admin.category.index');
        }
        Session::flash('error', 'Update Error');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $result = $this->categoryService->destroy($id);
        if ($result) {
            return response()->json([
                'success' => [
                    'deleteSuccess' => 'Delete Success'
                ],
                'result' => $result,
            ]);
            return redirect()->route('admin.category.index');
        }
        Session::flash('error', 'Delete Error');
    }
}
