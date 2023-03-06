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
            'create_time' => fake() -> time(),
            'order_number' => fake() -> unique() -> randomNumber(5),
            'total' => fake() -> randomNumber(6, false),  
            'customer_name' => fake() -> name(),
            'customer_surname' => fake() -> name(),
            'address' => fake() -> streetAddress(),
            'email' => fake() -> email(), 
            'phone_number' => fake() -> phoneNumber(),
        ];
    }
}
