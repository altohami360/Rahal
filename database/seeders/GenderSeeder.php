<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            'gender' => [
                'en' => 'Male',
                'ar' => 'ذكر',
            ]
        ]);
        Gender::create([
            'gender' => [
                'en' => 'Female',
                'ar' => 'أنثى',
            ]
        ]);
    }
}
