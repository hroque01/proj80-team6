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
                'image'=> 'https://d2j6dbq0eux0bg.cloudfront.net/images/73313140/2981172261.jpg',
                'visible'=> true,
                'restaurant_id'=> 1,
            ],
            [
                'name'=> 'Patatine fritte',
                'description'=> 'Frito belo',
                'ingredients'=> 'ti fidi di me?',
                'price'=> 2.50,
                'image'=> 'https://images.fidhouse.com/fidelitynews/wp-content/uploads/sites/6/2016/03/1457008490_947a03d0316de9c5ec47c435911c5c0d64c0a495-1430067252.jpg?w=580',
                'visible'=> true,
                'restaurant_id'=> 1,
            ],
            [
                'name'=> 'Kebab panino',
                'description'=> 'Piadina bella calda 2km',
                'ingredients'=> 'Impasto di piadina bella calda 2km',
                'price'=> 3.50,
                'image'=> 'https://d2j6dbq0eux0bg.cloudfront.net/images/62400814/2367230254.jpg',
                'visible'=> true,
                'restaurant_id'=> 1,
            ],
            [
                'name'=> 'Menu kebab panino',
                'description'=> 'Panino kebab + patatine + bibita',
                'ingredients'=> 'Panino, patatine',
                'price'=> 8,
                'image'=> 'http://kappa2kebab.com/wp-content/uploads/2020/09/m1.jpg',
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
