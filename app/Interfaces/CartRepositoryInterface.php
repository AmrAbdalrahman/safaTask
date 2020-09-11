<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CartRepositoryInterface
{
    public function addOrUpdateCustomerItem(Request $request);

    public function removeCustomerItem(Request $request);

    public function getCustomerCheckout($customerId);

    public function resetCustomerCart($customerId);

    #validation part
    public function addOrUpdateCartItemValidation(Request $request);

    public function removeCartItemValidation(Request $request);
}
