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
            'price'=> 4.50,
            'image'=> 'https://gnammydelivery.it/wp-content/uploads/2021/01/piadina.jpg',
            'visible'=> true,
            'restaurant_id'=> 1,
            ],
            [
            'name'=> 'Pizza Margherita',
            'description'=> 'Pomodoro, Mozzarella',
            'ingredients'=> 'Farina, Lievito',
            'price'=> 4.50,
            'image'=> 'https://www.finedininglovers.it/sites/g/files/xknfdk1106/files/styles/recipes_1200_800/public/fdl_content_import_it/margherita-50kalo.jpg.webp?itok=QlO8_AHv',
            'visible'=> true,
            'restaurant_id'=> 2,
            ],
        ];
        
        foreach ($dishes as $dish) {
            $dish = Dish::create($dish);
        }
    }
}
