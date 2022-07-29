<?php

namespace App\Http\Respositories;

interface InvoiceProductRepositoryInterface
{
    public function validSameProduct($productId,$invoiceId);
}
