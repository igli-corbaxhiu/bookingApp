<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->text(10),
            'model' => $this->faker->text(10),
            'engine' => $this->faker->text(10),
            'color' => $this->faker->text(10),
            'price' => rand(20, 1000),
            'status' => true,
            'timeBooked' => rand(0,5)
        ];
    }
}
