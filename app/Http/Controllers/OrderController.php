<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Repositories\CartRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    public function TotalPurchase($customer_id)
    {
        $TotalPurchase = $this->orderRepository->customerTotalPurchase($customer_id);
        if ($TotalPurchase)
            return $this->apiResponse(['TotalPurchase' => $TotalPurchase]);
        return $this->notFoundResponse('no cart found!');

    }

}
