<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Nationality::create([
            'country_code' => '11111',
            'country' => [
                'en' => 'Sudan',
                'ar' => 'السودان',
            ],
            'nationality' => [
                'en' => 'Sudanes',
                'ar' => 'سوداني',
            ],
        ]);
        Nationality::create([
            'country_code' => '11111',
            'country' => [
                'en' => 'Sudai',
                'ar' => 'السعودية',
            ],
            'nationality' => [
                'en' => 'Sudai',
                'ar' => 'السعودية',
            ],
        ]);
    }
}
