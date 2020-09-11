<?php

namespace App\Repositories;

use App\Interfaces\CartRepositoryInterface;
use App\Models\Cart;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CartRepository implements CartRepositoryInterface
{

    use ApiResponseTrait;

    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function addOrUpdateCustomerItem(Request $request)
    {
        /*use updateOrCreate to prevent duplicate same item for the same customer
         and update the quantity of cart item*/
        return $this->cart->updateOrCreate(
            ['item_id' => $request->item_id, 'customer_id' => $request->customer_id],
            ['quantity' => $request->quantity]
        );
    }

    public function removeCustomerItem(Request $request)
    {
        return $this->cart->where([['item_id', '=', $request->item_id],
            ['customer_id', '=', $request->customer_id]])->first()->delete();
    }

    public function getCustomerCheckout($customerId)
    {
        return $this->cart->where('customer_id', $customerId)->get();
    }

    public function resetCustomerCart($customerId)
    {
        return $this->cart->where('customer_id', $customerId)->delete();
    }

    #validation part
    public function addOrUpdateCartItemValidation(Request $request)
    {
        return $this->apiValidation($request, [
            'item_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
            'quantity' => 'required|numeric|gt:0',
        ]);
    }

    public function removeCartItemValidation(Request $request)
    {
        return $this->apiValidation($request, [
            'item_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
        ]);
    }


}
