<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Service::create([
            'service' => [
                'en' => 'Normal Trip',
                'ar' => 'رحلة عادية',
            ], 
            'description' => [
                'en' => 'service description',
                'ar' => 'وصف الخدمة',
            ], 
            'starting_value' => 9.99, 
            'per_kilometer' => 4.99,
            'per_minute' => 0.69,
        ]);
        Service::create([
            'service' => [
                'en' => 'Delivery',
                'ar' => 'توصيل',
            ], 
            'description' => [
                'en' => 'service description',
                'ar' => 'وصف الخدمة',
            ], 
            'starting_value' => 9.99, 
            'per_kilometer' => 4.99,
            'per_minute' => 0.69,
        ]);
        Service::create([
            'service' => [
                'en' => 'Unspecified Trip',
                'ar' => 'رحلة مفتوحة',
            ], 
            'description' => [
                'en' => 'service description',
                'ar' => 'وصف الخدمة',
            ], 
            'starting_value' => 9.99, 
            'per_kilometer' => 4.99,
            'per_minute' => 0.69,
        ]);


    }
}
