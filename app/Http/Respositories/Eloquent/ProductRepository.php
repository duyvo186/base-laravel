<?php

namespace App\Http\Respositories\Eloquent;

use App\Http\Respositories\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getAllProduct()
    {
        return $this->model->with('menu')->orderbyDesc('id')->paginate(20);
    }
}
