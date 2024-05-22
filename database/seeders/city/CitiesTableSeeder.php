<?php
// CitiesTableSeeder.php

namespace Database\Seeders\city;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            'id' => 1,
            'name' => 'NewYork',
            'population' => "Located in the northeastern USA, in the state of New York, with a population of approximately 8.4 million (as of 2020); known as -The Big Apple- with landmarks such as Times Square, Central Park, and the Statue of Liberty; a financial powerhouse with a diverse economy, vibrant arts scene, and prestigious institutions like Columbia University.",
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data for City 2
        DB::table('cities')->insert([
            'id' => 2,
            'name' => 'LosAngeles',
            'population' => "Located in Southern California, USA, with a population of approximately 4 million (as of 2020); known for its entertainment industry (Hollywood), diverse economy, Mediterranean climate, and key attractions like the Hollywood Sign, Griffith Observatory, and Venice Beach",
            'latitude' => 34.0522,
            'longitude' => -118.2437,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cities')->insert([
            'id' => 3,
            'name' => 'Paris',
            'population' => "Located in northern France, with a population of approximately 2.1 million (city proper as of 2020); known as -The City of Light- with landmarks such as the Eiffel Tower, Notre-Dame Cathedral, and the Louvre Museum; a global center for art, fashion, and culture with a diverse economy and prestigious institutions like Sorbonne University." ,
            'latitude' => 48.8566,
            'longitude' => 2.3522,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cities')->insert([
            'id' => 4,
            'name' => 'Damascus',
            'population' => " Located in southwestern Syria, with a population of approximately 1.7 million (as of 2020); one of the world's oldest continuously inhabited cities, with significant historical sites like the Umayyad Mosque and Azem Palace; an important economic hub with a mixed economy and educational institutions like the University of Damascus.",
            'latitude' => 2.3522,
            'longitude' => 36.2765,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Add more cities as needed
    }
}
