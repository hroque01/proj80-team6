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
                'name'  => 'Cinese',
                'image' => 'img/chinese.jpg',
            ],
            //3 GRECO
            [
                'name'  => 'Greco',
                'image' => 'img/greek.jpg',
            ],
            //4 INDIANO
            [
                'name'  => 'Indiano',
                'image' => 'img/indian.jpg',
            ],
            //5 ITALIANO
            [
                'name'  => 'Italiano',
                'image' => 'img/italian.jpg',
            ],
            //6 MESSICANO
            [
                'name'  => 'Messicano',
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
                'name'  => 'Dolci',
                'image' => 'img/sweet.jpg',
            ],
            //10 VEGANO
            [
                'name'  => 'Vegano',
                'image' => 'img/vegetarian.jpg',
            ],
            //11 KEBAB
            [
                'name'  => 'Kebab',
                'image' => 'img/kebab.jpg',
            ],
            //12 COLAZIONE
            [
                'name'  => 'Colazione',
                'image' => 'img/breakfast.jpg',
            ],
            //13 PESCE
            [
                'name'  => 'Pesce',
                'image' => 'img/fish.jpg',
            ],
        ];

        
        foreach ($typologies as $typology) {
            $typology = Typology::create($typology);
        }

    }
}
