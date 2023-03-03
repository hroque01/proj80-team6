<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RestaurantUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'business_name' => fake()-> words(rand(1, 3), true),
            'email' => fake()->unique()->email(),
            'password' => fake() -> regexify('[A-Z0-9]{20}'),
            'address' => fake()-> streetAddress(),
            'vat_number' => fake()->unique()->numerify('###########'),
        ];
    }
}
