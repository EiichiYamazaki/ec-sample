<?php

namespace App\UseCases\Item;

use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Model;

class StoreUseCase
{
    public function __construct(
        private readonly ItemRepository $itemRepository,
    ) {
    }

    /**
     * @param $request
     * @return Model
     */
    public function __invoke($request): Model
    {
        /** @var Item $item */
        $item = $this->itemRepository->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_published' => $request->is_published,
        ]);
        $item->categories()->sync($request->category);
        return $item;
    }
}