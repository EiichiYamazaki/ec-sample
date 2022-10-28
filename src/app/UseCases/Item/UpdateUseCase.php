<?php

namespace App\UseCases\Item;

use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateUseCase
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
    public function __invoke($id, $request): Model
    {
        $this->itemRepository->findBy('id', $id);
        $this->itemRepository->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_published' => $request->is_published,
        ]);
        $item = $this->itemRepository->firstBy();
        $item->categories()->sync($request->category);
        return $item;
    }
}