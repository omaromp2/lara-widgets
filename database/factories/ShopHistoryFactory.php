<?php

namespace Database\Factories;

use App\Models\ShopHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShopHistoryFactory extends Factory
{
    protected $model = ShopHistory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Widgets in history
            'prod_name' => $this->faker->name(),
            'current_price' => $this->faker->randomFloat(2, 0, 10000 ),
            'amount' => $this->faker->randomDigitNotNull()

        ];
    }
}
