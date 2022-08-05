<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Customer\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    /**
     * @param $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        return view('admin.customer.list', [
            "title" => __('text.customer.title.index'),
            "customers" => $this->customerService->getCustomer(),
        ]);
    }

    public function create()
    {
        return view('admin.customer.add', [
            'title' => __('text.customer.title.create'),
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->customerService->add($request);
        if ($result) {
            response()->json([
                'success' => [
                    'createSuccess' => 'Create Customer Success',
                ],
                'result' => $result,
            ]);
            return redirect()->route('admin.customer.index');
        }
    }

    public function show($customerId)
    {
        return view('admin.customer.detail', [
            'title' => __('text.customer.title.view'),
            'customerDetails' => $this->customerService->showCustomerDetail($customerId),
        ]);
    }

    public function update($customerId, Request $request): \Illuminate\Http\RedirectResponse
    {
        $result = $this->customerService->update($request, $customerId);
        response()->json([
            'success' => [
                'categorySuccess' => 'Update Success'
            ],
            'result' => $result,
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $result = $this->customerService->destroy($id);
        if ($result) {
            response()->json([
                'success' => [
                    'categorySuccess' => 'Delete Success'
                ],
                'result' => $result,
            ]);
            return redirect()->back();
        }
    }

    public function filterSearch(Request $request)
    {
        return view('admin.customer.search', [
            'title' => __('text.customer.title.customerSearch'),
            'customers' => $this->customerService->filterSearch($request),
        ]);
    }
}
