<?php

namespace App\Interfaces;

interface OrderRepositoryInterface
{
    public function customerTotalPurchase($customer_id);
}
