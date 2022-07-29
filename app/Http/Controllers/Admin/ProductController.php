<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateProductRequest;
use App\Http\Service\Category\CategoryService;
use App\Http\Service\Product\ProductAdminService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    /**
     * @param $productService
     */
    public function __construct(ProductAdminService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.product.list', [
            'title' => __('text.products.title.index'),
            'products' => $this->productService->getAll(),
            'categories' => $this->categoryService->getByConditions(),
        ]);
    }

    public function create()
    {
        return view('admin.product.add', [
            'title' => __('text.products.title.create'),
            'categories' => $this->categoryService->getByConditions()
        ]);
    }

    public function store(CreateCategoryRequest $request)
    {
        $result = $this->productService->storeProduct($request);
        if ($result) {
            response()->json([
                'success' => 'Add Product Success',
            ]);
            return redirect()->route('admin.product.index');
        }
        return redirect()->route('admin.product.index');
    }

    public function show($id)
    {
        return view('admin.product.edit', [
            'title' => __('text.products.title.edit'),
            'product' => $this->productService->show($id),
            'categories' => $this->categoryService->getByConditions(),
        ]);
    }

    public function update(CreateProductRequest $request, $productId)
    {
        $result = $this->productService->update($request, $productId);
        if ($result) {
            return redirect()->route('admin.product.index')->with('success', 'Update Success');
        }
        return redirect()->back()->with('error', 'Update Success');
    }

    public function destroy($id)
    {
        $result = $this->productService->delete($id);
        if ($result) {
            response()->json([
                'success' => 'Delete Success',
            ]);
            return redirect()->back();
        }
        return false;
    }
}
