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
                'image' => 'resources/img/hamburger.jpg',
            ],
            [
                'name'  => 'Chinese',
                'image' => 'resources/img/chinese.jpg',
            ],
            [
                'name'  => 'Greek',
                'image' => 'resources/img/greek.jpg',
            ],
            [
                'name'  => 'Indian',
                'image' => 'resources/img/indian.jpg',
            ],
            [
                'name'  => 'Italian',
                'image' => 'resources/img/italian.jpg',
            ],
            [
                'name'  => 'Mexican',
                'image' => 'resources/img/mexican.jpg',
            ],
            [
                'name'  => 'Pizza',
                'image' => 'resources/img/pizza.jpg',
            ],
            [
                'name'  => 'Sushi',
                'image' => 'resources/img/sushi.jpg',
            ],
            [
                'name'  => 'Sweets',
                'image' => 'resources/img/sweet.jpg',
            ],
            [
                'name'  => 'Vegan',
                'image' => 'resources/img/vegetarian.jpg',
            ],
            [
                'name'  => 'Kebab',
                'image' => 'resources/img/kebab.jpg',
            ],
            [
                'name'  => 'Breakfast',
                'image' => 'resources/img/breakfast.jpg',
            ],
            [
                'name'  => 'Fish',
                'image' => 'resources/img/fish.jpg',
            ],
        ];

        
        foreach ($typologies as $typology) {
            $typology = Typology::create($typology);
        }

    }
}
