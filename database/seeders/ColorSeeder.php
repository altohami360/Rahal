<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name' => [
                'en' => 'Black',
                'ar' => 'أسود',
            ]
        ]);
        Color::create([
            'name' => [
                'en' => 'White',
                'ar' => 'أبيض',
            ]
        ]);
        Color::create([
            'name' => [
                'en' => 'Selver',
                'ar' => 'فضي',
            ]
        ]);
    }
}
