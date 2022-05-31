<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
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
            'category_id' => mt_rand(1, 3),
            'title' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'harga' => mt_rand(10000, 50000),
            'exce' => $this->faker->paragraph(),
            'deskripsi' => $this->faker->paragraph(),
            'status' => true,
            'image' => $this->faker->imageUrl



        ];
    }
}
