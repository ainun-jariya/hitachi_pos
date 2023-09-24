<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->colorName,
            'sku' => fake()->postcode(),
            'price' => fake()->numberBetween(10000, 100000),
            'qty' => fake()->numberBetween(10, 100),
            'expired_at' => fake()->creditCardExpirationDate(),
        ];
    }
}
