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

    public function addUserItem(Request $request)
    {
        return $this->cart->create($request->all());
    }

    #validation part
    public function addCartItemValidation(Request $request)
    {
        return $this->apiValidation($request, [
            'item_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
    }


}
