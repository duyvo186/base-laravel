<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Customer\CustomerService;
use App\Http\Service\Invoice\InvoiceService;
use App\Http\Service\InvoiceProduct\InvoiceProductService;
use App\Http\Service\Product\ProductAdminService;
use Illuminate\Http\Request;

class InvoiceProductController extends Controller
{
    protected $invoiceProductService;
    protected $customerService;
    protected $productService;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(ProductAdminService $productService, InvoiceProductService $invoiceProductService, CustomerService $customerService)
    {
        $this->invoiceProductService = $invoiceProductService;
        $this->customerService = $customerService;
        $this->productService = $productService;

    }

    public function edit($invoiceId)
    {
        return view('admin.invoice.addProduct', [
            'title' => __('text.invoice.title.create'),
            'products' => $this->productService->getAll(),
            'invoices' => $this->invoiceProductService->findId($invoiceId),
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->invoiceProductService->store($request);
        if ($result) {
            return redirect()->route('admin.invoiceProduct.show',);
        }
    }

    public function show($id)
    {

        return view('admin.invoice.detail', [
            'title' => __('text.invoice.title.view'),
            'invoices' => $this->invoiceProductService->show($id),
            'customers' => $this->customerService->getCustomer(),
        ]);
    }

    public function update($id)
    {
        return $this->invoiceProductService->update($id);
    }
    public function destroy($id)
    {
        return $result = $this->invoiceProductService->destroy($id);
    }
}
