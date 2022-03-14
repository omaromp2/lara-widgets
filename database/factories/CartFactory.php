<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            // 'widget_name' => $this->faker->name(),
            // 'price' => $this->faker->randomFloat(2, 0, 10000)
            'amount' => $this->faker->randomDigitNotZero()
        ];
    }
}
