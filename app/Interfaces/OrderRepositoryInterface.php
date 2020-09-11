<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OrderRepositoryInterface
{
    public function customerTotalPurchase($customer_id);
    public function customerMakeOrder(Request $request);

    #validation part
    public function makeOrderValidation(Request $request);
}
