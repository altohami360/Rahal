<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyTrip>
 */
class DailyTripFactory extends Factory
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
            'total_cost' => rand(11, 50),
            'round_trip' => $this->faker->boolean(),
            'time_go' => $this->faker->time('H:i:s'),
            'time_back' => $this->faker->time('H:i:s'),
            'week_days' => [
                'Saturday' => $this->faker->boolean(),
                'Sunday' => $this->faker->boolean(),
                'Monday' => $this->faker->boolean(),
                'Tuesday' => $this->faker->boolean(),
                'Wednesday' => $this->faker->boolean(),
                'Thursday' => $this->faker->boolean(),
                'Friday' => $this->faker->boolean(),
                // ],
                // 'ar' => [
                //     'السبت' => $this->faker->boolean(),
                //     'الأحد' => $this->faker->boolean(),
                //     'الأثنين' => $this->faker->boolean(),
                //     'الثلاثاء' => $this->faker->boolean(),
                //     'الأربعاء' => $this->faker->boolean(),
                //     'الخميس' => $this->faker->boolean(),
                //     'الجمعة' => $this->faker->boolean(),
                // ],
            ],
            'customer_id' => rand(1, 10),
            'driver_id' => $this->faker->randomElement([rand(1, 10), NULL]),
        ];
    }
}
