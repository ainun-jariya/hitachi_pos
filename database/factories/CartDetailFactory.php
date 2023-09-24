<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartDetail>
 */
class CartDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productVariants = \App\Models\ProductVariant::all()->pluck('id')->toArray();

        return [
            'note' => fake()->realText,
            'price' => fake()->numberBetween(10000, 100000),
            'qty' => fake()->numberBetween(1, 7),
            'product_variant_id' => $productVariants[array_rand($productVariants)],
        ];
    }
}
