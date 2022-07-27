<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => '09927400445',
            'store_name' => $this->faker->word(),
            'address' => $this->faker->text(15),
            'user_id' => 1,
            'category_id' => 1,
        ];
    }
}
