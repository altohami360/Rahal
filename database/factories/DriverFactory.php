<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'personal_ID' => rand(100000, 999999),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('password'),
            'gender_id' => rand(1, 2),
            'birthday' => $this->faker->date(),
            'current_balance' => rand(100, 999),
            'image' => 'defaule.png',
            'identification_card_image' => 'defaule.png', 
            'gender_id' => rand(1,2), 
            'nationality_id' => rand(1,2), 
            'car_id' => rand(1,3), 
            // 'service_id' => rand(1,3), 
            'is_active' => $this->faker->boolean(),
        ];
    }
}
