<?php

namespace App\Http\Service\Invoice;

use App\Events\InvoiceProcessed;
use App\Http\Respositories\InvoiceProductRepositoryInterface;
use App\Http\Respositories\InvoiceRepositoryInterface;
use Illuminate\Support\Facades\Session;

class InvoiceService
{
    protected InvoiceRepositoryInterface $invoiceRepository;
    protected InvoiceProductRepositoryInterface $invoiceProductRepository;

    /**
     * @param InvoiceRepositoryInterface $invoiceRepository
     */
    public function __construct(InvoiceRepositoryInterface $invoiceRepository, InvoiceProductRepositoryInterface $invoiceProductRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
        $this->invoiceProductRepository = $invoiceProductRepository;
    }

    public function getInvoice()
    {
        return $this->invoiceRepository->getAll();
    }

    public function delete($invoiceId)
    {
        return $this->invoiceRepository->deleteWithRelationship($invoiceId);
    }

    public function filterSearch($request)
    {
        $valueSearch = $request->name;
        return $this->invoiceRepository->filterSearchRepository($valueSearch);
    }

    public function update($invoiceId, $request)
    {
        try {
            $items = [
                'customer_id' => $request->id
            ];
            return $this->invoiceRepository->update($items, $invoiceId);
        } catch (\Exception $err) {
            Session::flash('error', 'same name');
            return redirect()->back();
        }
    }

    public function create($request)
    {
        $itemInvoices = [
            'customer_id' => $request->customer_id,
            'total' => $request->totalAll,
        ];
        if($itemInvoices == null)
        {
            Session::flash('error','Create Error');
        }
        $invoice =  $this->invoiceRepository->insert($itemInvoices);
        $invoiceId = $invoice->id;

        foreach ($request->product_id as $key=>$value)
        {
            $itemInvoiceProduct[] = [
                'invoice_id' => $invoiceId,
                'total' => $request->total,
                'product_id'=> $request->product_id[$key],
                'quantity' => $request->quantity,
                'updated_at' => now(),
                'created_at' => now(),
            ];
            $this->invoiceProductRepository->create($itemInvoiceProduct);
        }

        InvoiceProcessed::dispatch($request->customer_id);
        return true;
    }
}
