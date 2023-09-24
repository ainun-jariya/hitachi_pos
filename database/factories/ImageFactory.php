<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file' => fake()->randomElement(['https://plchldr.co/i/150x150', 'https://plchldr.co/i/300x300']),
            'size_type' => fake()->randomElement(['thumb', 'original']),
        ];
    }
}
