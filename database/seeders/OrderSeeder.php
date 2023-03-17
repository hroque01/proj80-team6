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
    //     $orders = [
    //         [
    //             //'create_time' => '19:00',
    //             //'order_number' => '324562',
    //             //'total' => 15.00,
    //             'customer_name' => 'Mario Rossi',
    //             //'address' => 'Via Mario Rossi, 69',
    //             //'email' => 'mariorossi@gmail.com',
    //             //'phone_number' => '3334445557',
    //             'restaurant_id'=> 2,
    //         ],
    //         [
    //             //'create_time' => '19:00',
    //             //'order_number' => '46132',
    //             //'total' => 24.35,
    //             'customer_name' => 'Luigi Bianchi',
    //             //'address' => 'Via Luigi Verdi, 65',
    //             //'email' => 'luigiverdi@gmail.com',
    //             //'phone_number' => '3234565784',
    //             'restaurant_id'=> 1,
    //         ],
    //     ];

    //     foreach ($orders as $order) {
    //         $order = Order::create($order);
    //     }

    //     $order_1 = Order::find(1);
    //     $dish_1 = Dish::find([2]);
    //     $order_1->dishes()->attach($dish_1);

    //     $order_2 = Order::find(2);
    //     $dish_2 = Dish::find([1]);
    //     $order_2->dishes()->attach($dish_2);
       
    }
}
