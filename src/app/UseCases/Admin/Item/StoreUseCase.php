<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Item;

use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Model;

class StoreUseCase
{
    public function __construct(
        private readonly ItemRepository $itemRepository,
    ) {
    }

    public function __invoke($request): Model
    {
        /** @var Item $item */
        $item = $this->itemRepository->create([
            'name'         => $request->name,
            'description'  => $request->description,
            'price'        => $request->price,
            'is_published' => $request->is_published,
        ]);
        $item->categories()->sync($request->category);

        return $item;
    }
}
