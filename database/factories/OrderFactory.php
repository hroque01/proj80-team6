<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'create_date' => fake()->dateTimeBetween( '-2 years', 'now'),
            'create_time' => fake()->time(),
            'order_number' => fake()->unique()->numberBetween(100000, 999999),
            'total' => fake()->randomFloat(2, 10, 100),
            'customer_name' => fake()->name(),
            'address' => fake()->address(),
            'email' => fake()->email(),
            'phone_number' => fake()->phoneNumber(),
            'completed' => fake()->boolean(),
            'restaurant_id' => fake()->numberBetween(1, 26),

            //Info carta pagamento
            'card_number' => fake()->unique()->numberBetween(100000, 999999),
            'expiration_date' => fake()->numberBetween(1000, 9999)
        ];
    }
}
