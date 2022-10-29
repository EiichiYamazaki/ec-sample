<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    /**
     * @param int $id
     * @return null
     */
    public function find(int $id)
    {
        return Item::query()->find($id);
    }

    /**
     * @return null
     */
    public function findAll()
    {
        return Item::query()->get();
    }

    /**
     * @param array $data
     * @return null
     */
    public function create(array $data)
    {
        return Item::query()->create($data);
    }

    /**
     * @param array $data
     * @return null
     */
    public function update(array $data)
    {
        return Item::query()->update($data);
    }
}