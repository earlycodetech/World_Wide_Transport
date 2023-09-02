<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Locations>
 */
class LocationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'destination' => $this->faker->country,
            'departure' => fake()->country,
            'price' => fake()->numberBetween(10000, 100000),
            'passengers' => fake()->numberBetween(10, 40)
        ];
    }
}
