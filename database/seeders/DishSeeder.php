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

        $dishes = [
            [
            'name'=> 'Kebab Piadina',
            'description'=> 'Piadina bella calda 2km',
            'ingredients'=> 'Impasto di piadina bella calda 2km',
            'price'=> '4.50',
            'image'=> 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fgnammydelivery.it%2Fprodotto%2Fkebab-piadina-temptation-food%2F&psig=AOvVaw3rS8H_C7-WKNShaLjs7Zb9&ust=1678360611482000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCKj6sNKazP0CFQAAAAAdAAAAABAE',
            'visible'=> true,
            'restaurant_id'=> 1,
            ],
            [
            'name'=> 'Pizza Margherita',
            'description'=> 'Pomodoro, Mozzarella',
            'ingredients'=> 'Farina, Lievito',
            'price'=> '4.50',
            'image'=> 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.finedininglovers.it%2Fricette%2Fbrunch%2Fpizza-margherita-0&psig=AOvVaw0OAj49TjflB9Et7z51oad1&ust=1678360682052000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCOjmj_SazP0CFQAAAAAdAAAAABAE',
            'visible'=> true,
            'restaurant_id'=> 2,
            ],
        ];
        
        foreach ($dishes as $dish) {
            $dish = Dish::create($dish);
        }
    }
}
