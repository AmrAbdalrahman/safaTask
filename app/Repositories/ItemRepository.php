<?php

namespace App\Repositories;

use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{

    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function getItemsPagination()
    {
        return $this->item->orderBy('created_at', 'DESC')->paginate(15);
    }


}
