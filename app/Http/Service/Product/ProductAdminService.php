<?php

namespace App\Http\Service\Product;

use App\Http\Respositories\ProductRepositoryInterface;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Session;

class ProductAdminService extends ServiceProvider
{
    protected $productRepository;
    /**
     * @param $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getCategory()
    {
        return $this->productRepository->getByConditions(['active' => 1]);
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function update($request, $productId)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) return false;
        try {
            $this->productRepository->update($request->all(), $productId);
            return true;

        } catch (\Exception $err) {
            \Log::info($err->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
    public function show($id)
    {
        return $this->productRepository->find($id);
    }

    public function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'please enter price > price_sale');
            return false;
        }
        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', ' please enter price');
            return false;
        }
        return true;
    }

    public function storeProduct($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) return false;
        try {
            $result = $this->productRepository->insert($request->all());
            Session::flash('success', 'Thêm Sản Phẩm Thành Công');
        } catch (Exception $exception) {
            return false;
        }
    }
}
