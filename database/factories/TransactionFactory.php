<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $outlets = \App\Models\Outlet::all()->pluck('id')->toArray();

        return [
            'note' => fake()->realText,
            'total_price' => fake()->numberBetween(10000, 100000),
            'total_discounted' => fake()->numberBetween(0, 10),
            'payment_method' => fake()->randomElement(['cash', 'debit', 'qris']),
            'status' => fake()->randomElement(['new', 'waiting_payment', 'delivery', 'done']),
            'outlet_id' => $outlets[array_rand($outlets)],
            'is_delivery' => false,
        ];
    }
}
