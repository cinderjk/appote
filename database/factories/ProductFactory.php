<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        $name = $this->faker->unique()->word;
        $slug = Str::slug($name);

        return [
            'category_id' => rand(1, 10),
            'brand_id' => rand(1, 10),
            'media_id' => 1,
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(20000, 30000),
            'sale_price' => $this->faker->numberBetween(5000, 19999),
        ];
    }
}
