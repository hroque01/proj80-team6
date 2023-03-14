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
                'image' => 'hamburger.jpg',
            ],
            //2 CINESE
            [
                'name'  => 'Cinese',
                'image' => 'chinese.jpg',
            ],
            //3 GRECO
            [
                'name'  => 'Greco',
                'image' => 'greek.jpg',
            ],
            //4 INDIANO
            [
                'name'  => 'Indiano',
                'image' => 'indian.jpg',
            ],
            //5 ITALIANO
            [
                'name'  => 'Italiano',
                'image' => 'italian.jpg',
            ],
            //6 MESSICANO
            [
                'name'  => 'Messicano',
                'image' => 'mexican.jpg',
            ],
            //7 PIZZA
            [
                'name'  => 'Pizza',
                'image' => 'pizza.jpg',
            ],
            //8 SUSHI
            [
                'name'  => 'Sushi',
                'image' => 'sushi.jpg',
            ],
            //9 DOLCI
            [
                'name'  => 'Dolci',
                'image' => 'sweet.jpg',
            ],
            //10 VEGANO
            [
                'name'  => 'Vegano',
                'image' => 'vegetarian.jpg',
            ],
            //11 KEBAB
            [
                'name'  => 'Kebab',
                'image' => 'kebab.jpg',
            ],
            //12 COLAZIONE
            [
                'name'  => 'Colazione',
                'image' => 'breakfast.jpg',
            ],
            //13 PESCE
            [
                'name'  => 'Pesce',
                'image' => 'fish.jpg',
            ],
        ];

        
        foreach ($typologies as $typology) {
            $typology = Typology::create($typology);
        }

    }
}
