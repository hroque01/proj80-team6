<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Typology>
 */
class TypologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() -> words(rand(1, 3), true),
            'description' => fake() -> text(rand(10,20)),
            'image' => fake() -> imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),
        ];
    }
}
