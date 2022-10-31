<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Item;

use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Collection;

class IndexUseCase
{
    public function __construct(
        private readonly ItemRepository $itemRepository
    ) {
    }

    public function __invoke(): Collection
    {
        return $this->itemRepository->findAll();
    }
}
