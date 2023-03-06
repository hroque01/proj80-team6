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
        
        // Associazione di un ordine al primo ristorante random
        // Associazione di un ordine da 1 a 5 piatti random
        Order :: factory() -> count(10) -> make() -> each(function($order) {
            
            $restaurant = Restaurant::inRandomOrder() -> first();
            // Relazione 1 to M 
            $order -> restaurant() -> associate($restaurant);
            $order -> save();

            // Relazione M to M
            $dishes = Dish::inRandomOrder() -> limit(rand(1,5)) -> get();

            $order -> dishes() -> attach($dishes);

        });
    }
}
