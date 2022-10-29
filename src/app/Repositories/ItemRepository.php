<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;

class ItemRepository
{
    private Builder $item;

    public function __construct(Item $item)
    {
        $this->item = $item::query();
    }

    /**
     * @param int $id
     * @return null
     */
    public function find(int $id)
    {
        return $this->item->find($id);
    }

    /**
     * @return null
     */
    public function findAll()
    {
        return $this->item->get();
    }

    /**
     * @param array $data
     * @return null
     */
    public function create(array $data)
    {
        return $this->item->create($data);
    }

    /**
     * @param array $data
     * @return null
     */
    public function update(array $data)
    {
        return $this->item->update($data);
    }
}