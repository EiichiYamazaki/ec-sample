<?php

namespace App\UseCases\Item;

use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Model;

class StoreUseCase
{
    private ItemRepository $itemRepository;

    public function __construct(
        ItemRepository $itemRepository
    ) {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @param $request
     * @return Model
     */
    public function __invoke($request): Model
    {
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