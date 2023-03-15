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
                'image' => 'hamburgers.png',
            ],
            //2 CINESE
            [
                'name'  => 'Cinese',
                'image' => 'cinese.png',
            ],
            //3 GRECO
            [
                'name'  => 'Greco',
                'image' => 'greco.png',
            ],
            //4 INDIANO
            [
                'name'  => 'Indiano',
                'image' => 'indiano.png',
            ],
            //5 ITALIANO
            [
                'name'  => 'Italiano',
                'image' => 'italiano.png',
            ],
            //6 MESSICANO
            [
                'name'  => 'Messicano',
                'image' => 'messicano.png',
            ],
            //7 PIZZA
            [
                'name'  => 'Pizza',
                'image' => 'pizza.png',
            ],
            //8 SUSHI
            [
                'name'  => 'Sushi',
                'image' => 'sushi.png',
            ],
            //9 DOLCI
            [
                'name'  => 'Dolci',
                'image' => 'dolci.png',
            ],
            //10 VEGANO
            [
                'name'  => 'Vegano',
                'image' => 'vegano.png',
            ],
            //11 KEBAB
            [
                'name'  => 'Kebab',
                'image' => 'kebab.png',
            ],
            //12 COLAZIONE
            [
                'name'  => 'Colazione',
                'image' => 'colazione.png',
            ],
            //13 PESCE
            [
                'name'  => 'Pesce',
                'image' => 'pesce.png',
            ],
        ];

        
        foreach ($typologies as $typology) {
            $typology = Typology::create($typology);
        }

    }
}
