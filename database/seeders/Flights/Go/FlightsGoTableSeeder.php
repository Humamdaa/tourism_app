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
            'NumStops' => 2,
            'office_id' => 1,
            'from_city_id' => 1,
            'to_city_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //from Damascus to NewYork from 4 to 1
        DB::table('flightsgo')->insert([
            'id' => 2,
            'date' => '2024-6-1',
            'takeoff' => '07:00',
            'landing' => '10:05',
            'duration' => '03:05',
            'capacity' => 100,
            'NumStops' => 3,
            'office_id' => 2,
            'from_city_id' => 4,
            'to_city_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //from 2 to 4
        DB::table('flightsgo')->insert([
            'id' => 3,
            'date' => '2024-7-2',
            'takeoff' => '10:30',
            'landing' => '14:45',
            'duration' => '4:15',
            'capacity' => 100,
            'office_id' => 3,
            'NumStops' => 1,
            'from_city_id' => 2,
            'to_city_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //from 4 to 2
        DB::table('flightsgo')->insert([
            'id' => 4,
            'date' => '2024-8-20',
            'takeoff' => '12:30',
            'landing' => '02:45',
            'duration' => '02:15',
            'capacity' => 100,
            'NumStops' => 1,
            'office_id' => 4,
            'from_city_id' => 4,
            'to_city_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // from 4 to 3
        DB::table('flightsgo')->insert([
            'id' => 5,
            'date' => '2024-6-20',
            'takeoff' => '16:30',
            'landing' => '19:30',
            'duration' => '03:00',
            'capacity' => 100,
            'NumStops' => 1,
            'office_id' => 4,
            'from_city_id' => 4,
            'to_city_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // from 4 to 3
        DB::table('flightsgo')->insert([
            'id' => 6,
            'date' => '2024-7-25',
            'takeoff' => '20:30',
            'landing' => '23:45',
            'duration' => '03:15',
            'capacity' => 100,
            'NumStops' => 1,
            'office_id' => 4,
            'from_city_id' => 4,
            'to_city_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //from Damascus to NewYork  4 to 1
        DB::table('flightsgo')->insert([
            'id' => 7,
            'date' => '2024-6-5',
            'takeoff' => '07:00',
            'landing' => '10:05',
            'duration' => '03:05',
            'capacity' => 100,
            'office_id' => 4,
            'from_city_id' => 4,
            'to_city_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //from Damascus to NewYork 4 to 1
        DB::table('flightsgo')->insert([
            'id' => 8,
            'date' => '2024-6-15',
            'takeoff' => '13:30',
            'landing' => '16:30',
            'duration' => '03:00',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 4,
            'to_city_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //from Damascus to NewYork 4 to 1
        DB::table('flightsgo')->insert([
            'id' => 9,
            'date' => '2024-6-30',
            'takeoff' => '19:40',
            'landing' => '22:25',
            'duration' => '02:45',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 4,
            'to_city_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //from NewYork to Damascus 1 to 4
        DB::table('flightsgo')->insert([
            'id' => 10,
            'date' => '2024-6-25',
            'takeoff' => '13:30',
            'landing' => '15:30',
            'duration' => '2:00',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 1,
            'to_city_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //from NewYork to Damascus 1 to 4
        DB::table('flightsgo')->insert([
            'id' => 11,
            'date' => '2024-6-30',
            'takeoff' => '06:30',
            'landing' => '08:45',
            'duration' => '2:15',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 1,
            'to_city_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //from 2 to 4
        DB::table('flightsgo')->insert([
            'id' => 12,
            'date' => '2024-7-2',
            'takeoff' => '13:30',
            'landing' => '17:30',
            'duration' => '4:00',
            'capacity' => 100,
            'office_id' => 3,
            'from_city_id' => 2,
            'to_city_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // from 2 to 4
        DB::table('flightsgo')->insert([
            'id' => 13,
            'date' => '2024-7-10',
            'takeoff' => '16:30',
            'landing' => '21:35',
            'duration' => '4:05',
            'capacity' => 100,
            'office_id' => 3,
            'from_city_id' => 2,
            'to_city_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //from NewYork to Damascus 1 to 2
        DB::table('flightsgo')->insert([
            'id' => 14,
            'date' => '2024-6-25',
            'takeoff' => '13:30',
            'landing' => '15:30',
            'duration' => '2:00',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 1,
            'to_city_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //from NewYork to Damascus 1 to 2
        DB::table('flightsgo')->insert([
            'id' => 15,
            'date' => '2024-6-25',
            'takeoff' => '13:30',
            'landing' => '15:30',
            'duration' => '2:00',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 1,
            'to_city_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //from NewYork to Damascus 2 to 1
        DB::table('flightsgo')->insert([
            'id' => 16,
            'date' => '2024-7-20',
            'takeoff' => '13:30',
            'landing' => '15:30',
            'duration' => '2:00',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 2,
            'to_city_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //from NewYork to Damascus 2 to 1
        DB::table('flightsgo')->insert([
            'id' => 17,
            'date' => '2024-7-25',
            'takeoff' => '09:10',
            'landing' => '11:30',
            'duration' => '2:20',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 2,
            'to_city_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //from NewYork to Damascus 1 to 3
        DB::table('flightsgo')->insert([
            'id' => 18,
            'date' => '2024-8-01',
            'takeoff' => '06:30',
            'landing' => '08:20',
            'duration' => '1:50',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 1,
            'to_city_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //from NewYork to Damascus 1 to 3
        DB::table('flightsgo')->insert([
            'id' => 19,
            'date' => '2024-8-31',
            'takeoff' => '14:10',
            'landing' => '16:25',
            'duration' => '2:15',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 1,
            'to_city_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //from NewYork to Damascus 3 to 1
        DB::table('flightsgo')->insert([
            'id' => 20,
            'date' => '2024-8-01',
            'takeoff' => '10:30',
            'landing' => '11:20',
            'duration' => '1:50',
            'capacity' => 100,
            'office_id' => 1,
            'from_city_id' => 3,
            'to_city_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //from NewYork to Damascus 3 to 1
        DB::table('flightsgo')->insert([
            'id' => 21,
            'date' => '2024-8-31',
            'takeoff' => '14:10',
            'landing' => '16:25',
            'duration' => '2:15',
            'capacity' => 100,
            'office_id' => 2,
            'from_city_id' => 3,
            'to_city_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
