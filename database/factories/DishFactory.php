<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => fake() -> words(rand(1, 5), true),
            'description' => fake() -> text(rand(10,20)),
            'ingredients' => fake() -> words(rand(1, 30), true),
            'price' => fake() -> randomNumber(3, false),
            'image' => fake() -> imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),
            'visible' => fake() -> boolean(),

        ];
    }
}
