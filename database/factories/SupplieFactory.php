<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplie>
 */
class SupplieFactory extends Factory
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
            'email_address' => $this->faker->safeEmail(),
            'contact_number' => $this->faker->phoneNumber,
            //'status' => $this->faker->boolean(),
            'address' => $this->faker->paragraph,
        ];
    }
}
