<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'name'         => 'Guatemala',
            'country_code' => '502',
            'timezone'     => 'GMT-6',
            'is_active'       => true
        ]);

        Country::create([
            'name'         => 'Honduras',
            'country_code' => '504',
            'timezone'     => 'GMT-6',
            'is_active'       => true
        ]);

        Country::create([
            'name'         => 'Panamá',
            'country_code' => '507',
            'timezone'     => 'GMT-5',
            'is_active'       => true
        ]);

        Country::create([
            'name'         => 'Nicaragua',
            'country_code' => '505',
            'timezone'     => 'GMT-6',
            'is_active'       => true
        ]);

        Country::create([
            'name'         => 'Costa Rica',
            'country_code' => '506',
            'timezone'     => 'GMT-6',
            'is_active'       => true
        ]);

        Country::create([
            'name'         => 'República Dominicana',
            'country_code' => '1',
            'timezone'     => 'GMT-4',
            'is_active'       => false
        ]);
    }
}
