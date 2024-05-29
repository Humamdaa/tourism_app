<?php

namespace Database\Seeders\Flights\Go;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightsGoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flightsgo')->insert([
            'id' => 1,
            'date' => '2024-5-20',
            'takeoff' => '03:30',
            'landing' => '05:45',
            'duration' => '2:15',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 1,
            'to_city_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('flightsgo')->insert([
            'id' => 2,
            'date' => '2024-6-1',
            'takeoff' => '07:00',
            'landing' => '10:05',
            'duration' => '03:05',
            'capacity' => 100,
            'office_id' => 2,
            'from_city_id' => 4,
            'to_city_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('flightsgo')->insert([
            'id' => 3,
            'date' => '2024-7-2',
            'takeoff' => '10:30',
            'landing' => '14:45',
            'duration' => '4:15',
            'capacity' => 100,
            'office_id' => 3,
            'from_city_id' => 2,
            'to_city_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('flightsgo')->insert([
            'id' => 4,
            'date' => '2024-8-20',
            'takeoff' => '12:30',
            'landing' => '02:45',
            'duration' => '02:15',
            'capacity' => 100,
            'office_id' => 4,
            'from_city_id' => 4,
            'to_city_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('flightsgo')->insert([
            'id' => 5,
            'date' => '2024-6-20',
            'takeoff' => '16:30',
            'landing' => '19:30',
            'duration' => '03:00',
            'capacity' => 100,
            'office_id' => 4,
            'from_city_id' => 4,
            'to_city_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('flightsgo')->insert([
            'id' => 6,
            'date' => '2024-7-25',
            'takeoff' => '20:30',
            'landing' => '23:45',
            'duration' => '03:15',
            'capacity' => 100,
            'office_id' => 4,
            'from_city_id' => 4,
            'to_city_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
