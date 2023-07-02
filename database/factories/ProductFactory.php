<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->streetName(),
            'content' => fake()->text(),
            'price' => rand(0, 5000),
            'quantity' => rand(0,5),
            'category_id' => Category::get()->random()->id,
            'brand_id' => Category::get()->random()->id,
        ];
    }
}
