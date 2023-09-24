<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ktp_no' => fake()->creditCardNumber,
            'npwp_no' => fake()->creditCardNumber,
            'siup_no' => fake()->creditCardNumber,
        ];
    }
}
