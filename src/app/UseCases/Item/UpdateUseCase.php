<?php

declare(strict_types=1);

namespace App\UseCases\Item;

use App\Exceptions\NoItemException;
use App\Models\Item;
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

    public function __invoke($id, $request): Model
    {
        if ($this->itemService->exists($id) === false) {
            throw new NoItemException($id, '商品が取得できませんでした。');
        }

        $this->itemRepository->update($id, [
            'name'         => $request->name,
            'description'  => $request->description,
            'price'        => $request->price,
            'is_published' => $request->is_published,
        ]);
        /** @var Item $item */
        $item = $this->itemRepository->find($id);
        $item->categories()->sync($request->category);

        return $item;
    }
}
