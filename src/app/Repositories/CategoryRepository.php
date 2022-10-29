<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class CategoryRepository
{
    private Builder $category;

    public function __construct(Category $category)
    {
        $this->category = $category::query();
    }

    /**
     * @param int $id
     * @return null
     */
    public function find(int $id)
    {
        return $this->category->find($id);
    }

    /**
     * @return null
     */
    public function findAll()
    {
        return $this->category->get();
    }

    /**
     * @param array $data
     * @return null
     */
    public function update(array $data)
    {
        return $this->category->update($data);
    }
}