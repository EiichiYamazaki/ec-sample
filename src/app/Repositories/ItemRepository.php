<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

class ItemRepository extends BaseRepository
{
    /**
     * @property \App\Models\Item
     */
    protected string $name = 'Item';
    protected Builder $query;
}