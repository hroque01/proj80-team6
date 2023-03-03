<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\User;
use App\Models\Dish;
use App\Models\Order;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::factory() -> count(10) -> make() -> each(function($r) {

            $user = User::inRandomOrder() -> first();
            $r -> user() -> associate($user);
            $r -> save();

            $typologies = Typology::inRandomOrder() -> limit(rand(2, 3)) -> get();
            $r -> typologies() -> attach($typologies);
            
        });
    }
}
