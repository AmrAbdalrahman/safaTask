<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CartRepositoryInterface
{
    public function addUserItem(Request $request);

    public function addCartItemValidation(Request $request);
}
