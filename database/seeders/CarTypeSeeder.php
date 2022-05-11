<?php

namespace Database\Seeders;

use App\Models\CarType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarType::create([
            'type' => [
                'en' => 'BMW',
                'ar' => 'بي ام دبليو'
            ]
        ]);
        CarType::create([
            'type' => [
                'en' => 'Toyot',
                'ar' => 'تويوتا'
            ]
        ]);
        CarType::create([
            'type' => [
                'en' => 'Honda',
                'ar' => 'هونداي'
            ]
        ]);
        CarType::create([
            'type' => [
                'en' => 'Mercedes',
                'ar' => 'مرسيديس'
            ]
        ]);
    }
}
