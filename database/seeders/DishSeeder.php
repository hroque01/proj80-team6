<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Dish;
use App\Models\Restaurant;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Relazione 1 to M
        // Associazione di un piatto al primo ristorante random
        Dish :: factory() -> count(10) -> make() -> each(function($dish) {
            
            $restaurant = Restaurant::inRandomOrder() -> first();

            $dish -> restaurant() -> associate($restaurant);
            $dish -> save();

        });
    }
}
