<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Item;

use App\Enum\ItemEnum;
use App\Exceptions\NoItemException;
use App\Models\Item;
use App\Repositories\CategoryRepository;
use App\Repositories\ItemRepository;
use App\Services\ItemService;

class EditUseCase
{
    public function __construct(
        private readonly ItemRepository $itemRepository,
        private readonly CategoryRepository $categoryRepository,
        private readonly ItemService $itemService,
    ) {
    }

    public function __invoke($id): array
    {
        if ($this->itemService->exists($id) === false) {
            throw new NoItemException($id, '商品が取得できませんでした。');
        }

        /** @var Item $item */
        $item = $this->itemRepository->find($id);

        $categoryItems = [];
        foreach ($item->categories->toArray() as $category) {
            $categoryItems[] = $category['pivot']['category_id'];
        }

        $categories = $this->categoryRepository->findAll();

        $itemEnum = ItemEnum::cases();

        return [$item, $categoryItems, $categories, $itemEnum];
    }
}
