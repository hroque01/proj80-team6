<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Typology;
use App\Models\Restaurant;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $typologies = [
            //1 HAMBURGER
            [
                'name'  => 'Hamburgers',
                'image' => 'img/hamburger.jpg',
            ],
            //2 CINESE
            [
                'name'  => 'Chinese',
                'image' => 'img/chinese.jpg',
            ],
            //3 GRECO
            [
                'name'  => 'Greek',
                'image' => 'img/greek.jpg',
            ],
            //4 INDIANO
            [
                'name'  => 'Indian',
                'image' => 'img/indian.jpg',
            ],
            //5 ITALIANO
            [
                'name'  => 'Italian',
                'image' => 'img/italian.jpg',
            ],
            //6 MESSICANO
            [
                'name'  => 'Mexican',
                'image' => 'img/mexican.jpg',
            ],
            //7 PIZZA
            [
                'name'  => 'Pizza',
                'image' => 'img/pizza.jpg',
            ],
            //8 SUSHI
            [
                'name'  => 'Sushi',
                'image' => 'img/sushi.jpg',
            ],
            //9 DOLCI
            [
                'name'  => 'Sweets',
                'image' => 'img/sweet.jpg',
            ],
            //10 VEGANO
            [
                'name'  => 'Vegan',
                'image' => 'img/vegetarian.jpg',
            ],
            //11 KEBAB
            [
                'name'  => 'Kebab',
                'image' => 'img/kebab.jpg',
            ],
            //12 COLAZIONE
            [
                'name'  => 'Breakfast',
                'image' => 'img/breakfast.jpg',
            ],
            //13 PESCE
            [
                'name'  => 'Fish',
                'image' => 'img/fish.jpg',
            ],
        ];

        
        foreach ($typologies as $typology) {
            $typology = Typology::create($typology);
        }

    }
}
