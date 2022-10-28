<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

class CategoryRepository extends BaseRepository
{
    /**
     * @property \App\Models\Category
     */
    protected string $name = 'Category';
    protected Builder $query;
}