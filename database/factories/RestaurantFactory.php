<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'description' => fake() -> text(rand(10,20)),
            'opening_time' => fake() -> time(),
            'closure_time' => fake() -> time(),
            'delivery' => fake() -> boolean(),
            'delivery_price' => fake() -> randomNumber(3, false),
            'delivery_time' => fake() -> time(),
            'image' => fake() -> imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),

        ];
    }
}
