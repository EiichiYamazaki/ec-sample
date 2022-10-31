<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AdminRepository
{
    public function create(array $data): Model|Builder
    {
        return Admin::query()->create($data);
    }
}
