<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => ['ua'=>fake()->words(1, true),'ru'=>fake()->words(1, true),'en'=>fake()->words(1, true)],
            'description' => ['ua'=>fake()->realText(rand(150,350)),'ru'=>fake()->realText(rand(150,350)),'en'=>fake()->realText(rand(150,350))],
            'slug' => fake()->unique()->words(1, true),
            'SKU' => fake()->unique()->ean8(),
            'size' => ['ua'=>fake()->words(1, true),'ru'=>fake()->words(1, true),'en'=>fake()->words(1, true)],
            'price' => fake()->randomFloat(2,10,100),
            'discount' => rand(0,90),
            'in_stock' => rand(0,15),
            'thumbnail' => fake()->imageUrl(category: 'cars',randomize: true),
            'obj_model' => fake()->imageUrl(category: 'cars',randomize: true),
            'pdf' => fake()->imageUrl(category: 'cars',randomize: true)
        ];
    }
}
