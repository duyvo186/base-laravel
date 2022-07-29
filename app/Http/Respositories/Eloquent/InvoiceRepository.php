<?php

namespace App\Http\Respositories\Eloquent;

use App\Http\Respositories\InvoiceRepositoryInterface;
use App\Models\Invoice;

class InvoiceRepository extends BaseRepository implements InvoiceRepositoryInterface
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(Invoice $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function findIdWithRelationship($invoiceId)
    {
        return $this->model->with('invoiceProducts')->find($invoiceId)->delete();
    }

    public function filterSearchRepository($valueSearch)
    {
        return $this->model->orWhereHas('invoiceProducts.product', function ($query) use ($valueSearch) {
            $query->where('name', 'LIKE', '%' . $valueSearch . '%');
        })->get();
    }
}
