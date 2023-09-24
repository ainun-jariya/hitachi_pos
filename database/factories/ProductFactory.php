<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $categories = \App\Models\Category::all()->pluck('id')->toArray();
        return [
            'name' => fake()->name,
            'detail' => fake()->paragraph(),
            'category_id' => $categories[array_rand($categories)],
        ];
    }
}
