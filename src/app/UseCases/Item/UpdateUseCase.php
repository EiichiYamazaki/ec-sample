<?php

namespace App\UseCases\Item;

use App\Repositories\ItemRepository;
use App\Services\ItemService;
use Illuminate\Database\Eloquent\Model;

class UpdateUseCase
{
    public function __construct(
        private readonly ItemRepository $itemRepository,
        private readonly ItemService $itemService,
    ) {
    }

    /**
     * @param $id
     * @param $request
     * @return Model
     */
    public function __invoke($id, $request): Model
    {
        if ($this->itemService->exists($id) === false) {
            dd('商品が見つかりません。Exception作る');
        }
        $item = $this->itemRepository->find($id);
        $this->itemRepository->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_published' => $request->is_published,
        ]);
        $item->categories()->sync($request->category);
        return $item;
    }
}