<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Customer\CustomerService;
use App\Http\Service\Invoice\InvoiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    protected $invoiceService;
    protected $customerService;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(InvoiceService $invoiceService, CustomerService $customerService)
    {
        $this->invoiceService = $invoiceService;
        $this->customerService = $customerService;
    }

    public function index()
    {
        return view('admin.invoice.index', [
            'title' => __('text.invoice.title.index'),
            'invoices' => $this->invoiceService->getInvoice(),
        ]);
    }

    public function destroy($invoiceId)
    {
        $result = $this->invoiceService->deleteInvoice($invoiceId);
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

    }

    public function filterSearch(Request $request)
    {
        return view('admin.invoice.search', [
            'title' => __('text.invoice.title.invoiceSearch'),
            'invoices' => $this->invoiceService->filterSearch($request),
        ]);
    }
}
