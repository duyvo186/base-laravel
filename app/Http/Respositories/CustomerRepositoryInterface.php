<?php

namespace App\Http\Respositories;

interface CustomerRepositoryInterface
{
    public function getCustomerQuery();
    public function filterSearchRepository($valueSearch);
}
