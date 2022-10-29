<?php

namespace App\Services;

use App\Repositories\ItemRepository;

class ItemService
{
    public function __construct(
        private readonly ItemRepository $itemRepository,
    ) {
    }

    public function exists(int $id): bool
    {
        $item = $this->itemRepository->find($id);

        return $item !== null;
    }
}