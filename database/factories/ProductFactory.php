<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'name'        => fake()->unique()->words(2, true),
            'price'       => fake()->randomFloat(2, 5, 500),
            'stock'       => fake()->numberBetween(0, 200),
        ];
    }
}
