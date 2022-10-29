<?php

namespace Tests\Unit\App\Repositories;

use App\Enum\ItemEnum;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemRepositoryTest extends TestCase
{
    use WithFaker;
    private ItemRepository $itemRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->itemRepository = new ItemRepository();
    }

    public function test_商品の取得が正しくできているか(): void
    {
        $name = 'テスト商品';
        $description = 'テスト商品の説明';
        $price = 100;
        $isPublished = ItemEnum::Publish->value;
        $id = Item::create(
            [
                'name' => $name,
                'description' => $description,
                'price' => $price,
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
}
