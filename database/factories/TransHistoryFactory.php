<?php

namespace Database\Factories;

use App\Models\TransHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransHistoryFactory extends Factory
{

    protected $model = TransHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // History Header
            'transaction_total' => $this->faker->randomFloat(2, 0, 10000) ,
            'products' => $this->faker->randomDigitNotZero()
        ];
    }
}
