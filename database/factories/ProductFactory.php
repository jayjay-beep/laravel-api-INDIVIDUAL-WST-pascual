<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        return [
            //
            'product'        => fake()->words(3, true),
            'description'    => fake()->paragraph(),
            'status'         => fake()->randomElement(['A', 'C', 'H', 'X']),
            'user_id'        => User::factory(),

        ];
    }
}
