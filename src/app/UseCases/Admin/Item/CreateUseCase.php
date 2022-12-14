<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Item;

use App\Enum\ItemEnum;
use App\Repositories\CategoryRepository;

class CreateUseCase
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository
    ) {
    }

    public function __invoke(): array
    {
        $categories = $this->categoryRepository->findAll();
        $itemEnum = ItemEnum::cases();

        return [$categories, $itemEnum];
    }
}
