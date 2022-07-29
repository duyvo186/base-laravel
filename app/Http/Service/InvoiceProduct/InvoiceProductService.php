<?php

namespace App\Http\Service\InvoiceProduct;

use App\Http\Respositories\InvoiceProductRepositoryInterface;

class InvoiceProductService
{
    protected InvoiceProductRepositoryInterface $invoiceProductRepository;

    /**
     * @param InvoiceProductRepositoryInterface $invoiceProductRepository
     */
    public function __construct(InvoiceProductRepositoryInterface $invoiceProductRepository)
    {
        $this->invoiceProductRepository = $invoiceProductRepository;
    }

    public function findId($invoiceId)
    {
        return $this->invoiceProductRepository->getByConditions(['invoice_id' => $invoiceId]);
    }

    public function store($request)
    {
        $productId = $request->product_id;
        $invoiceId = $request->invoice_id;

        $checkProductId = $this->invoiceProductRepository->validSameProduct($productId, $invoiceId);
        if ($checkProductId->first()) {
            return $this->invoiceProductRepository->updateMass($request->except(['_token']), ['invoice_id' => $invoiceId, 'product_id' => $productId]);
        }
        $result = [
            'invoice_id' => $invoiceId,
            'product_id' => $productId,
            'quantity' => $request->quantity,
            'total' => $request->total,
        ];
        return $this->invoiceProductRepository->insert($result);
    }

    public function show($id)
    {
        return $this->invoiceProductRepository->getByConditions(['invoice_id' => $id]);
    }

    public function destroy($id)
    {
        return $this->invoiceProductRepository->delete($id);
    }

}
