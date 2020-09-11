<?php

namespace App\Repositories;

use App\Interfaces\customerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements customerRepositoryInterface
{

    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function discountFromStoreCredit($customerId, $totalPrice)
    {
        $customer = $this->customer->findOrFail($customerId);

        if ($customer->store_credit >= $totalPrice) {
            $customer->store_credit = $customer->store_credit - $totalPrice;

            $customer->save();
            return true;
        } else return false;
    }


}
