<?php

namespace Database\Seeders;

use App\Models\City\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'name' => 'Cairo',
            'country_id' => 1,
            'price' => '500',
            'num_days' => '7',
            'image' => 'cities-01.jpg',
        ]);

        City::create([
            'name' => 'Luxor',
            'country_id' => 1,
            'price' => '800',
            'num_days' => '7',
            'image' => 'cities-01.jpg',
        ]);

        City::create([
            'name' => 'Zurich',
            'country_id' => 2,
            'price' => '1500',
            'num_days' => '7',
            'image' => 'cities-02.jpg',
        ]);

        City::create([
            'name' => 'Paris',
            'country_id' => 3,
            'price' => '1000',
            'num_days' => '7',
            'image' => 'cities-03.jpg',
        ]);

        City::create([
            'name' => 'Bangkok',
            'country_id' => 4,
            'price' => '600',
            'num_days' => '7',
            'image' => 'cities-04.jpg',
        ]);
    }
}
