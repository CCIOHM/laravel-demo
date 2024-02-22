<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => fake()->randomElement(config('pokemons.names')),
            'provider_name' => fake()->company(),
            'provider_email' => fake()->unique()->safeEmail(),
            'price_ht' => fake()->randomFloat(2, 1, 1000),
            'buying_price' => fake()->randomFloat(2, 1, 1000),
            'quantity' => rand(0, 100),
            'picture_path' => fake()->filePath(),
            'description' => fake()->realText(), // max 200 chars
            'created_at' => $now = now(),
            'updated_at' => $now,
        ];
    }
}
