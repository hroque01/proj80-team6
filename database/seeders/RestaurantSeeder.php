<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\Typology;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Relazione M to M
        // Creazione ristoranti e associazione da 1 a 5 tipologie random
        Restaurant::factory() -> count(3) -> create() -> each(function($res) {

            $typologies = Typology::inRandomOrder() -> limit(rand(1,5)) -> get();

            $res -> typologies() -> attach($typologies);

        });
    }
}