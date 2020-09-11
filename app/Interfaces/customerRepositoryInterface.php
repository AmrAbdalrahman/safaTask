<?php

namespace App\Interfaces;

interface customerRepositoryInterface
{
    public function discountFromStoreCredit($customerId,$totalPrice);
}
