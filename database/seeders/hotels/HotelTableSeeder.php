<?php

namespace Database\Seeders\hotels;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelTableSeeder extends Seeder
{

    public function run(): void
    {
        //city1 is NewYork
        DB::table('hotels')->insert([
            'id' => 1,
            'name' => 'Hotel NYC',
            'phone_hotel' => '123-456-7890',
            'rate' => 1,
            'price' => 200,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'city_id' => 1, // Assuming New York has id 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('hotels')->insert([
            'id' => 2,
            'name' => 'Hotel NYCE',
            'phone_hotel' => '123-456-7890',
            'rate' => 2,
            'price' => 10,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'city_id' => 1, // Assuming New York has id 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('hotels')->insert([
            'id' => 3,
            'name' => 'Hotel ABC',
            'phone_hotel' => '123-456-7890',
            'rate' => 3,
            'price' => 75,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'city_id' => 1, // Assuming New York has id 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data for Hotel (city) 2 in LosAngeles
        DB::table('hotels')->insert([
            'id' => 4,
            'name' => 'Hotel LA',
            'phone_hotel' => '123-456-7890',
            'rate' => 3,
            'price' => 150,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'latitude' => 34.0522,
            'longitude' => -118.2437,
            'city_id' => 2, // Assuming LosAngeles has id 2
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('hotels')->insert([
            'id' => 5,
            'name' => 'Hotel LB',
            'phone_hotel' => '123-456-7890',
            'rate' => 4,
            'price' => 20,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'latitude' => 34.0522,
            'longitude' => -118.2437,
            'city_id' => 2, // Assuming Los Angeles has id 2
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
