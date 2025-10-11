<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            "name" => $this->faker->unique()->sentence(),
            "description" => $this->faker->optional()->paragraph(),
            "price" => $this->faker->randomFloat(2, 1, 1000),
            "category_id" => Category::all()->random()->id,
        ];
    }
}
