<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Customer;
use App\Models\Order;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class OrderRepository implements OrderRepositoryInterface
{
    use ApiResponseTrait;

    protected $customer;
    protected $customerRepository;
    protected $order;
    protected $cartRepository;

    public function __construct(Customer $customer, CustomerRepository $customerRepository, Order $order,
                                CartRepository $cartRepository)
    {
        $this->customer = $customer;
        $this->customerRepository = $customerRepository;
        $this->order = $order;
        $this->cartRepository = $cartRepository;
    }

    public function customerTotalPurchase($customer_id)
    {
        return $this->customer->findOrFail($customer_id)->getTotalPurchase();
    }

    public function customerMakeOrder(Request $request)
    {
        $customerId = $request->customer_id;
        $totalPrice = $this->customerTotalPurchase($customerId);
        //first check and discount total price from customer store credit
        if ($this->customerRepository->discountFromStoreCredit($customerId, $totalPrice)) {
            //second save the transaction and make the order
            $input = $request->all();
            $input['total'] = $totalPrice;
            $input['customer_id'] = $customerId;
            $this->order->create($input);
            //third reset customer cart
            $this->cartRepository->resetCustomerCart($customerId);
            return true;

        } else {
            return false;
        }
        // TODO: Implement customerMakeOrder() method.
    }


    #validation part
    public function makeOrderValidation(Request $request)
    {
        return $this->apiValidation($request, [
            'address' => 'required',
            'telephone' => 'required|numeric',
            'customer_id' => 'required|numeric',
        ]);
    }


}
