<?php

namespace App\Http\Respositories\Eloquent;

use App\Http\Respositories\InvoiceProductRepositoryInterface;
use App\Models\InvoiceProduct;

class InvoiceProductRepository extends BaseRepository implements InvoiceProductRepositoryInterface
{
    protected $model;

    /**
     * @param InvoiceProduct $model
     */
    public function __construct(InvoiceProduct $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function validSameProduct($productId, $invoiceId)
    {
        return $this->model->where('product_id', '=', $productId)
            ->where('invoice_id', '=', $invoiceId)->get();
    }
}
