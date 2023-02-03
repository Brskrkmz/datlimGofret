<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adress>
 */
class AdressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'adress_id' => 2,
            'city' => $this->faker->city,
            'district' => $this->faker->city,
            'zipcode' => $this->faker->randomDigitNotZero(), 
            'adress' => $this->faker->adress, 
            'is_default' => $this->faker->boolean, 
        ];
    }
}
