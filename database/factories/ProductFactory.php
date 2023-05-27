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
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name,
            'supplier_id' => 1,
            'description' => $this->faker->sentence,
            'product_code' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'unit_price' => $this->faker->randomFloat(2, 0.01, 9999),
            'quantity' => $this->faker->numberBetween(0, 1000),
            'inventory_value' => $this->faker->randomFloat(2, 0.01, 999999),
        ];
    }
}
