<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Customer\CustomerService;
use App\Http\Service\Invoice\InvoiceService;
use App\Http\Service\Product\ProductAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    protected $invoiceService;
    protected $customerService;
    protected $productService;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(InvoiceService $invoiceService, CustomerService $customerService, ProductAdminService $productService)
    {
        $this->invoiceService = $invoiceService;
        $this->customerService = $customerService;
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.invoice.index', [
            'title' => __('text.invoice.title.index'),
            'invoices' => $this->invoiceService->getInvoice(),
        ]);
    }

    public function create()
    {
        return view('admin.invoice.add', [
            'title'=> __('text.invoice.title.createInvoice'),
            'customers' => $this->customerService->getCustomer(),
            'products' => $this->productService->getAll(),
        ]);
    }

    public function store(Request $request)
    {
        $result =  $this->invoiceService->create($request);
        if ($result) {
            response()->json([
                'success' => [
                    'createSuccess' => 'Create Product Success',
                ],
            ]);
            return redirect()->route('admin.category.index');
        }
        return redirect()->back();
    }

    public function destroy($invoiceId)
    {
        $result = $this->invoiceService->delete($invoiceId);
        if ($result) {
            response()->json([
                'success' => [
                    'deleteSuccess' => 'Delete Invoice Success',
                ],
                'result' => $result,
            ]);
            return redirect()->back();
        }
        Session::flash('error', 'Delete Failed');
        return redirect()->back();
    }

    public function filterSearch(Request $request)
    {
        return view('admin.invoice.search', [
            'title' => __('text.invoice.title.invoiceSearch'),
            'invoices' => $this->invoiceService->filterSearch($request),
        ]);
    }

    public function update($invoiceId, Request $request)
    {
        $result =  $this->invoiceService->update($invoiceId, $request);
        if($result)
        {
            response()->json([
                'success' => [
                    'updateSuccess' => 'Update Invoice Success',
                ],
                'result' => $result,
            ]);
            return redirect()->back();
        }
        return false;
    }
}
