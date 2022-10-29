<?php

namespace App\UseCases\Item;

use App\Repositories\ItemRepository;

class IndexUseCase
{
    public function __construct(
        private readonly ItemRepository $itemRepository
    ) {
    }

    public function __invoke(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->itemRepository->findAll();
    }
}