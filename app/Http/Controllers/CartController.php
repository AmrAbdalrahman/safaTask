<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{

    private $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function addItemCart(Request $request)
    {
        $validation = $this->cartRepository->addCartItemValidation($request);
        if ($validation) {
            return $validation;
        }

        if ($this->cartRepository->addUserItem($request)) {
            return $this->apiResponse("item added to cart successfully");
        }
        return $this->unKnowError("Error while saving the item to cart");
    }

}
