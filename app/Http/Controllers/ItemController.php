<?php

namespace App\Http\Controllers;

use App\Repositories\ItemRepository;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{

    private $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function getItemsPagination()
    {
        $items = $this->itemRepository->getItemsPagination();
        if (count($items) > 0) {
            return $this->apiResponse(ItemResource::collection($items));
        }
        return $this->notFoundResponse('no items found');
    }

}
