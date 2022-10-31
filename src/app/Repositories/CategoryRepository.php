<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository
{
    public function find(int $id): Model|Collection|Builder|null
    {
        return Category::query()->find($id);
    }

    /**
     * @return Builder[]|Collection
     */
    public function findAll(): Collection|array
    {
        return Category::query()->get();
    }

    public function update(array $data): int
    {
        return Category::query()->update($data);
    }
}
