<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->create([
            'name' => '武器',
        ]);
        Category::query()->create([
            'name' => '食べ物',
        ]);
        Category::query()->create([
            'name' => '小物',
        ]);
        Category::query()->create([
            'name' => '秘密',
        ]);
    }
}
