<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $orders = [
            //  [
            //      'create_time' => '19:00',
            //      'order_number' => '324562',
            //      'total' => 15.00,
            //      'customer_name' => 'Mario Rossi',
            //      'address' => 'Via Mario Rossi, 69',
            //      'email' => 'mariorossi@gmail.com',
            //      'phone_number' => '3334445557',
            //      'completed' => false,
            //      'restaurant_id'=> 2,
            //  ],
            
         ];

         foreach ($orders as $order) {
             $order = Order::create($order);
         }

        //  $order_1 = Order::find(1);
        //  $dish_1 = Dish::find([2]);
        //  $order_1->dishes()->attach($dish_1);
    }
}
