<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pickup_address' => $this->faker->address(), 
            'pickup_latitude' => rand(10, 20) . '.' . rand(10000,1000000), 
            'pickup_longitude' => rand(10, 20) . '.' . rand(10000,1000000), 
            'dropoff_address' => $this->faker->address(), 
            'dropoff_latitude' => rand(10, 20) . '.' . rand(10000,1000000), 
            'dropoff_longitude' => rand(10, 20) . '.' . rand(10000,1000000), 
            'note' => $this->faker->paragraph(4),
            'distance' => rand(10, 30),
            'cost' => rand(11, 50),
            'service_id' => rand(1, 3),
            'driver_id' => rand(1, 10),
            'customer_id' => rand(1, 10),
            'status_id' => rand(1, 7),
        ];
    }
}
