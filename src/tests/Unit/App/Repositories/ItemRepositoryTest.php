<?php

declare(strict_types=1);

namespace Tests\Unit\App\Repositories;

use App\Enum\ItemEnum;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Database\Seeders\ItemSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemRepositoryTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;
    private ItemRepository $itemRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->itemRepository = new ItemRepository();
        $this->seed(ItemSeeder::class);
    }

    public function test_find_商品の取得が正しくできているか(): void
    {
        $name = 'テスト商品';
        $description = 'テスト商品の説明';
        $price = 100;
        $isPublished = ItemEnum::Publish->value;
        $id = Item::create(
            [
                'name'         => $name,
                'description'  => $description,
                'price'        => $price,
                'is_published' => $isPublished,
            ]
        )->id;

        $item = $this->itemRepository->find($id);

        static::assertNotNull($item);
        static::assertSame($id, $item->id);
        static::assertSame($description, $item->description);
        static::assertSame($price, $item->price);
        static::assertSame($isPublished, $item->is_published->value);
    }

    public function test_find_取得できなかった場合nullが返ってくる(): void
    {
        $id = 999999;
        $item = $this->itemRepository->find($id);

        static::assertNull($item);
    }

    public function test_findAll_必要なフィールドが取得できるか(): void
    {
        $items = $this->itemRepository->findAll();

        $expected = [
            'id', 'name', 'description', 'price', 'is_published', 'created_at', 'updated_at',
        ];

        static::assertSame($expected, array_keys($items->toArray()[0]));
    }

    public function test_create(): void
    {
        $dataModel = Item::factory()->makeOne();
        $item = $this->itemRepository->create($dataModel->toArray());

        static::assertSame($dataModel->name, $item->name);
        static::assertSame($dataModel->description, $item->description);
        static::assertSame($dataModel->price, $item->price);
        static::assertSame($dataModel->is_published->value, $item->is_published->value);
    }
}
