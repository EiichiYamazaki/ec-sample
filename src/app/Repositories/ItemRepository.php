<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ItemRepository
{
    public function find(int $id): Model|Collection|Builder|null
    {
        return Item::query()->find($id);
    }

    public function findAll(): Collection|Builder
    {
        return Item::query()->get();
    }

    public function create(array $data): Model|Builder
    {
        return Item::query()->create($data);
    }

    public function update(int $id, array $data): int
    {
        return Item::query()->where('id', $id)->update($data);
    }
}
