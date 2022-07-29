<?php

namespace App\Http\Respositories;

use App\Http\Respositories\BaseRepositoryInterface;
use http\Env\Request;

interface ProductRepositoryInterface
{
    public function getAllProduct();
}
