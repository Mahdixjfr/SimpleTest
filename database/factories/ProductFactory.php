<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'name' => $this->faker->name(),
            'photo' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'user_id' => rand(1, 10),
            'price' => rand(100000, 1000000),
            'inventory' => rand(50, 100),
        ];
    }
}
