<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'car_type_id' => 1,
            'model' => '2020',
            'plate_number' => 121,
            'color_id' => rand(1,3),
            'car_image_front' => 'default.png',
            'car_image_back' => 'default.png',
            'car_image_left' => 'default.png',
            'car_image_right' => 'default.png',
            'car_insurance_image' => 'default.png',
        ]);

        Car::create([
            'car_type_id' => 2,
            'model' => '2021',
            'plate_number' => 102,
            'color_id' => rand(1,3),
            'car_image_front' => 'default.png',
            'car_image_back' => 'default.png',
            'car_image_left' => 'default.png',
            'car_image_right' => 'default.png',
            'car_insurance_image' => 'default.png',
        ]);

        Car::create([
            'car_type_id' => 3,
            'model' => '2018',
            'plate_number' => 2121,
            'color_id' => rand(1,3),
            'car_image_front' => 'default.png',
            'car_image_back' => 'default.png',
            'car_image_left' => 'default.png',
            'car_image_right' => 'default.png',
            'car_insurance_image' => 'default.png',
        ]);
    }
}
