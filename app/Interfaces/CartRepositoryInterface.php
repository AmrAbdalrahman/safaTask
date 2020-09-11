<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CartRepositoryInterface
{
    public function addUserItem(Request $request);
    public function removeUserItem(Request $request);

    #validation part
    public function addOrUpdateCartItemValidation(Request $request);

    public function removeCartItemValidation(Request $request);
}
