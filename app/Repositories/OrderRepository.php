<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Customer;

class OrderRepository implements OrderRepositoryInterface
{

    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function customerTotalPurchase($customer_id)
    {
        return $this->customer->findOrFail($customer_id)->getTotalPurchase();
    }


}
