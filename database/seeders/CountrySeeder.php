<?php

namespace Database\Seeders;

use App\Models\Country\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(): void
    {
        Country::create([
            'name' => 'Egypt',
            'population' => '109.3',
            'territory' => '275.400',
            'avg_price' => '165.450',
            'description' => 'Egypt, a country linking northeast Africa with the Middle East, dates to the time of the pharaohs. Millennia-old monuments sit along the fertile Nile River Valley, including Giza\'s colossal Pyramids and Great Sphinx as well as Luxor\'s hieroglyph-lined Karnak Temple and Valley of the Kings tombs.',
            'image' => 'country-01.jpg',
            'continent' => 'Africa',
        ]);

        $country_switzerland = Country::create([
            'name' => 'Switzerland',
            'population' => '8.703',
            'territory' => '275.400',
            'avg_price' => '165.450',
            'description' => 'Switzerland is a mountainous Central European country, home to numerous lakes, villages and the high peaks of the Alps.',
            'image' => 'country-02.jpg',
            'continent' => 'Europe',
        ]);

        $country_france = Country::create([
            'name' => 'France',
            'population' => '67.75',
            'territory' => '275.400',
            'avg_price' => '165.450',
            'description' => 'France, in Western Europe, encompasses medieval cities, alpine villages and Mediterranean beaches. Paris, its capital, is famed for its fashion houses, classical art museums including the Louvre and monuments like the Eiffel Tower.',
            'image' => 'country-03.jpg',
            'continent' => 'Europe',
        ]);

        $country_thailand = Country::create([
            'name' => 'Thailand',
            'population' => '71.6',
            'territory' => '275.400',
            'avg_price' => '165.450',
            'description' => 'Thailand is a Southeast Asian country. It\'s known for tropical beaches, opulent royal palaces, ancient ruins and ornate temples displaying figures of Buddha.',
            'image' => 'cities-01.jpg',
            'continent' => 'Asia',
        ]);
    }
}
