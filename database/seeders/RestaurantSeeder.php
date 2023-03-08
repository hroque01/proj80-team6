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
        $restaurants = [
            [
                'business_name' => 'Kebab not bad',
                'description' => 'Kebab is lovely',
                'address' => 'Via Cristoforo Colombo, 24F',
                'opening_time' => '10:00:00',
                'closure_time' => '01:00:00',
                'delivery_price' => 5,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/piadina.jpg',
                'user_id' => 1,
            ],
            [
                'business_name' => 'Pizza Place',
                'description' => 'Pizza is all you want',
                'address' => 'Via Garibaldi, 12',
                'opening_time' => '12:00:00',
                'closure_time' => '00:00:00',
                'delivery_price' => 5,
                'image' => 'https://giallozafferano.it/images/249-24919/Pizza-napoletana_650x433_wm.jpg',
                'user_id' => 2,
            ],
        ];

        foreach ($restaurants as $restaurant) {
            $restaurant = Restaurant::create($restaurant);
        }

         // Relazione M to M
            // Creazione ristoranti e associazione da 1 a 5 tipologie random
            $restaurant_1 = Restaurant::find(1);
            $typology_2 = Typology::find([2]);
            $restaurant_1->typologies()->attach($typology_2);

            $restaurant_2 = Restaurant::find(2);
            $typology_1 = Typology::find([1]);
            $restaurant_2->typologies()->attach($typology_1);
    }
}