<?php

namespace App\Http\Respositories;

interface InvoiceRepositoryInterface
{
    public function filterSearchRepository($request);
    public function deleteWithRelationship($request);
}
