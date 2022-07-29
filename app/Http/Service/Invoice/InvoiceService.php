<?php

namespace App\Http\Service\Invoice;

use App\Http\Respositories\InvoiceRepositoryInterface;

class InvoiceService
{
    protected InvoiceRepositoryInterface $invoiceRepository;

    /**
     * @param InvoiceRepositoryInterface $invoiceRepository
     */
    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function getInvoice()
    {
        return $this->invoiceRepository->getAll();
    }

    public function deleteInvoice($invoiceId)
    {
        return $this->invoiceRepository->findIdWithRelationship($invoiceId);

    }

    public function filterSearch($request)
    {
        $valueSearch = $request->name;
        return $this->invoiceRepository->filterSearchRepository($valueSearch);
    }
}
