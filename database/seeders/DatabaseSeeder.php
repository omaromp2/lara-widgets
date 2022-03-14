<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\ShopHistory;
use App\Models\TransHistory;
use App\Models\User;
use App\Models\Widget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function GuzzleHttp\Promise\each;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // Create random users with orders
        User::factory(15)->create()
        ->each(function($user)  {

            // Rand Widget
            // Create random widgets
            Widget::factory(rand(1,5))
            ->create()
            ->each(function($widget) use($user) {
                // generate items in cart
                Cart::factory(rand(1,8))
                ->create([
                    'user_id' => $user->id,
                    'prod_id' => $widget->id,
                    'widget_name' => $widget->name,
                    'current_price' => $widget->price
                ]);

                // generate the placed orders
                TransHistory::factory(rand(1,3))
                ->create([
                    'user_id' => $user->id,
                ])->each(function($header) use ($widget) {
                    // we generate widgets for the header
                    ShopHistory::factory(rand(1,5))->create([
                        'transac_id' => $header->id,
                        'prod_name' => $widget->name,
                        'current_price' => $widget->price,
                        // 'amount' => $widget->amount
                    ]);
                });

            });

        });




    }
}
