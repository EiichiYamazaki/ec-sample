<?php

namespace App\UseCases\Item;

use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Collection;

class IndexUseCase
{
    public function __construct(
        private readonly ItemRepository $itemRepository
    ) {
    }

    /**
     * @return Collection
     */
    public function __invoke(): Collection
    {
        return $this->itemRepository->findAll();
    }
}