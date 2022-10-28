<?php

namespace App\UseCases\Item;

use App\Enum\ItemEnum;
use App\Repositories\CategoryRepository;
use App\Repositories\ItemRepository;

class EditUseCase
{
    private ItemRepository $itemRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(
        ItemRepository $itemRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->itemRepository = $itemRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke($id): array
    {
        $this->itemRepository->findBy('id', $id);
        $item = $this->itemRepository->firstBy();

        $categoryItems = [];
        foreach ($item->categories as $category) {
            $categoryItems[] = $category->pivot->category_id;
        }

        $categories = $this->categoryRepository->getBy();

        $itemEnum = ItemEnum::cases();
        return [$item, $categoryItems, $categories, $itemEnum];
    }
}