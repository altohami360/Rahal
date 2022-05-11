<?php

namespace Database\Seeders;

use App\Models\Nat;
use App\Models\Nationality;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            LaratrustSeeder::class,
            ServiceSeeder::class,
            CarTypeSeeder::class,
            GenderSeeder::class,
            NationalitySeeder::class,
            StatusSeeder::class,
            ColorSeeder::class,
            CustomerSeeder::class,
            ReviewSeeder::class,
            CarSeeder::class,
            DriverSeeder::class,
            TripSeeder::class,
            DailyTripSeeder::class
        ]);



        // Start seed nationalities from file .sql
        // Nat::unguard();
        // $path = 'E:\my staff\laravel\LaraVali\laravel\database\seeders\nationalities.sql';
        // DB::unprepared(file_get_contents($path));
        // $this->command->info('Country table seeded!');
        // End seed nationalities from file .sql

    }
}
