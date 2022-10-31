<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enum\ItemEnum;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name'         => $this->faker->name,
            'description'  => $this->faker->realText,
            'price'        => 500,
            'is_published' => ItemEnum::Publish->value,
        ];
    }
}
