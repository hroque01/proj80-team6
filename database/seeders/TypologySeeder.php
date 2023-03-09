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
            [
                'name'  => 'Hamburgers',
                'image' => 'img/hamburger.jpg',
            ],
            [
                'name'  => 'Chinese',
                'image' => 'img/chinese.jpg',
            ],
            [
                'name'  => 'Greek',
                'image' => 'img/greek.jpg',
            ],
            [
                'name'  => 'Indian',
                'image' => 'img/indian.jpg',
            ],
            [
                'name'  => 'Italian',
                'image' => 'img/italian.jpg',
            ],
            [
                'name'  => 'Mexican',
                'image' => 'img/mexican.jpg',
            ],
            [
                'name'  => 'Pizza',
                'image' => 'img/pizza.jpg',
            ],
            [
                'name'  => 'Sushi',
                'image' => 'img/sushi.jpg',
            ],
            [
                'name'  => 'Sweets',
                'image' => 'img/sweet.jpg',
            ],
            [
                'name'  => 'Vegan',
                'image' => 'img/vegetarian.jpg',
            ],
            [
                'name'  => 'Kebab',
                'image' => 'img/kebab.jpg',
            ],
            [
                'name'  => 'Breakfast',
                'image' => 'img/breakfast.jpg',
            ],
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
