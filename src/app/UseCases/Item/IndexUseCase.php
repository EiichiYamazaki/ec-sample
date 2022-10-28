<?php

namespace App\UseCases\Item;

use App\Repositories\ItemRepository;

class IndexUseCase
{
    private ItemRepository $itemRepository;

    public function __construct(
        ItemRepository $itemRepository
    ) {
        $this->itemRepository = $itemRepository;
    }

    public function __invoke(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->itemRepository->getBy();
    }
}