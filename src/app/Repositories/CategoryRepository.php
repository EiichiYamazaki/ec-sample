<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class CategoryRepository
{
    /**
     * @param int $id
     * @return null
     */
    public function find(int $id)
    {
        return Category::query()->find($id);
    }

    /**
     * @return null
     */
    public function findAll()
    {
        return Category::query()->get();
    }

    /**
     * @param array $data
     * @return null
     */
    public function update(array $data)
    {
        return Category::query()->update($data);
    }
}