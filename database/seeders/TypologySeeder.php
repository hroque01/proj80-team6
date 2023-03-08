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
                'name'  => 'Pizza',
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Frecipes.timesofindia.com%2Frecipes%2Fcheese-pizza%2Frs53110049.cms&psig=AOvVaw0REFAwI6tWVeNy3ieyKef1&ust=1678358689841000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCLjppL6TzP0CFQAAAAAdAAAAABAE',
            ],
            [
                'name'  => 'Kebab',
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.recipetineats.com%2Fhomemade-chicken-doner-kebab%2F&psig=AOvVaw2nLeRVKFfJx09e9aaAe6DY&ust=1678358596301000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCOjLg5OTzP0CFQAAAAAdAAAAABAE',
            ],
        ];

        
        foreach ($typologies as $typology) {
            $typology = Typology::create($typology);
        }

    }
}
