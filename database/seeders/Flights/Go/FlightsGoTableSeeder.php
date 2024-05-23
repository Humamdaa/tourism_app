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
            'takeoff' => '03:30:00 PM',
            'landing' => '05:45:00 PM',
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
            'takeoff' => '09:00:00 AM',
            'landing' => '12:05:00 PM',
            'duration' => '3:05',
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
            'takeoff' => '10:30:00 AM',
            'landing' => '02:45:00 PM',
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
            'takeoff' => '12:30:00 PM',
            'landing' => '02:45:00 PM',
            'duration' => '2:15',
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
            'takeoff' => '8:30:00 AM',
            'landing' => '11:30:00 AM',
            'duration' => '3:00',
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
            'takeoff' => '11:30:00 PM',
            'landing' => '02:45:00 PM',
            'duration' => '3:15',
            'capacity' => 100,
            'office_id' => 4,
            'from_city_id' => 4,
            'to_city_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
