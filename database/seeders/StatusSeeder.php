<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'status' => [
                'en' => 'Searching',
                'ar' => 'جاري البحث',
            ],
            'color' => 'secondary'
        ]);
        Status::create([
            'status' => [
                'en' => 'Confirmed',
                'ar' => 'مؤكدة',
            ],
            'color' => 'info'
        ]);
        Status::create([
            'status' => [
                'en' => 'Ongoing',
                'ar' => 'جارية',
            ],
            'color' => 'primary'
        ]);
        Status::create([
            'status' => [
                'en' => 'Timeout',
                'ar' => 'مهملة',
            ],
            'color' => 'warning'
        ]);
        Status::create([
            'status' => [
                'en' => 'Completed',
                'ar' => 'انهاء بنجاح',
            ],
            'color' => 'success'
        ]);
        Status::create([
            'status' => [
                'en' => 'Customer Canceled',
                'ar' => 'ألغاء العميل',
            ],
            'color' => 'danger'
        ]);
        Status::create([
            'status' => [
                'en' => 'Captin Canceled',
                'ar' => 'ألغاء السائق',
            ],
            'color' => 'danger'
        ]);
    }
}
