<?php

namespace App\Http\Respositories\Eloquent;

use App\Http\Respositories\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    protected $model;

    /**
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getCustomerQuery()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    public function showDetail($customerId)
    {
        return $this->model->with('invoices')->where('id', $customerId)->get();
    }
    public function filterSearchRepository($valueSearch)
    {
        return $this->model->Where('name','LIKE',$valueSearch)->get();
    }
}
