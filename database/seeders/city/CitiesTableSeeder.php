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
            'id'=> 1 ,
            'name' => 'NewYork',
            'population' => 8537673,
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data for City 2
        DB::table('cities')->insert([
            'id'=>2,
            'name' => 'LosAngeles',
            'population' => 3979576,
            'latitude' => 34.0522,
            'longitude' => -118.2437,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add more cities as needed
    }
}
