<?php

namespace App\Http\Service\Customer;

use App\Http\Respositories\CustomerRepositoryInterface;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Session;

class CustomerService
{
    protected $customerInterface;

    /**
     * @param $CustomerInterface
     */
    public function __construct(CustomerRepositoryInterface $customerInterface)
    {
        $this->customerInterface = $customerInterface;
    }

    public function create($request)
    {
        $this->customerInterface->insert($request);
    }

    public function getCustomer()
    {
        return $this->customerInterface->getCustomerQuery();
    }

    public function getCondition($customerId)
    {
        return $this->customerInterface->getByConditions(['id' => $customerId]);
    }

    public function showCustomerDetail($customerId)
    {
        return $this->customerInterface->showDetail($customerId);
    }

    public function add($request)
    {
        return $this->customerInterface->insert($request->all());
    }

    public function update($request, $customerId)
    {
        try {
            $this->customerInterface->update($request->all(), $customerId);
            Session::flash('success', 'update success');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', 'update error');
            return false;
        }
    }
    public function destroy($id)
    {
        return $this->customerInterface->delete($id);
    }

}
