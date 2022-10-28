<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => '武器',
        ]);
        Category::create([
            'name' => '食べ物',
        ]);
        Category::create([
            'name' => '小物',
        ]);
        Category::create([
            'name' => '秘密',
        ]);
    }
}
