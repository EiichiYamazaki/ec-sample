<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enum\ItemEnum;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::query()->create([
            'name'         => '腐ったナイフ',
            'description'  => '切れないナイフ',
            'price'        => 100,
            'is_published' => ItemEnum::Publish,
        ]);
        Item::query()->create([
            'name'         => 'メッシュの盾',
            'description'  => '通気性の良い盾',
            'price'        => 150,
            'is_published' => ItemEnum::Publish,
        ]);
        Item::query()->create([
            'name'         => '高価なネジ',
            'description'  => 'プラスのネジ',
            'price'        => 999999,
            'is_published' => ItemEnum::Publish,
        ]);
        Item::query()->create([
            'name'         => '見えない剣',
            'description'  => '見えてはいけない',
            'price'        => 1000,
            'is_published' => ItemEnum::Private,
        ]);
    }
}
