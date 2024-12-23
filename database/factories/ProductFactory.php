<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1,4), // Fixed category_id
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(10,100),
            'description' => $this->faker->text(),
        ];
    }
}
