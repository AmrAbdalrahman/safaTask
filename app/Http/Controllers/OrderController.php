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

    public function makeOrder(Request $request)
    {
        $validation = $this->orderRepository->makeOrderValidation($request);
        if ($validation) {
            return $validation;
        }

        if ($this->orderRepository->customerMakeOrder($request)) {
            return $this->apiResponse("the order made successfully");
        }
        return $this->unKnowError("payment failed please check you're credit");
    }

}
