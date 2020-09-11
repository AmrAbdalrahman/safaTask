<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{

    public function toArray($request)
    {
        return [

            'key' => $this->id,
            'item' => new ItemResource($this->item),
            'quantity' => $this->quantity,
        ];
    }

}
