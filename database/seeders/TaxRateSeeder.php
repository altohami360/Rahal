<?php

namespace Database\Seeders;

use App\Models\Tax;
use App\Models\TaxRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxRate::create([
            'tax_rate' => 9.99,
            'is_Active' => true
        ]);
    }
}
