<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ItemRepository
{
    /**
     * @param int $id
     * @return Builder|Collection|Model|null
     */
    public function find(int $id): Model|Collection|Builder|null
    {
        return Item::query()->find($id);
    }

    /**
     * @return Builder|Collection
     */
    public function findAll(): Collection|Builder
    {
        return Item::query()->get();
    }

    /**
     * @param array $data
     * @return Builder|Model
     */
    public function create(array $data): Model|Builder
    {
        return Item::query()->create($data);
    }

    /**
     * @param array $data
     * @return int
     */
    public function update(array $data): int
    {
        return Item::query()->update($data);
    }
}