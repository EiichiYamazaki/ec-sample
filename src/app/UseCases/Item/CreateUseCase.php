<?php

namespace App\UseCases\Item;

use App\Enum\ItemEnum;
use App\Repositories\CategoryRepository;

class CreateUseCase
{
    private CategoryRepository $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke(): array
    {
        $categories = $this->categoryRepository->getBy();
        $itemEnum = ItemEnum::cases();
        return [$categories, $itemEnum];
    }
}