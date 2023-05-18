<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => json_encode(['ua'=>fake()->words(1, true),'ru'=>fake()->words(1, true),'en'=>fake()->words(1, true)]),
            'slug' => fake()->unique()->words(1, true)
        ];
    }
}
