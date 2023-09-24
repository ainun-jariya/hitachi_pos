<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'detail' => fake()->address,
            'lat' => fake()->latitude,
            'long' => fake()->longitude,
            'postal_code' => fake()->numberBetween(11111, 99999),
        ];
    }
}
