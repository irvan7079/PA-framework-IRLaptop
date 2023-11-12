<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laptop>
 */
class LaptopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merk_laptop' => fake()->word(),
            'spesifikasi_laptop' => fake()->sentence(),
            'stok_laptop' => fake()->numberBetween(5, 40),
            'harga_laptop' => fake()->randomElement([10000000, 15000000, 20000000, 25000000, 30000000]),
            'image_path' => fake()->numberBetween(1, 10).'.png',
        ];
    }
}
