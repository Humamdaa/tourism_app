<?php

namespace Database\Seeders\Flights\Go;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class flightsGoStopsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights_stops')->insert([
            'stop_id' => 1,
            'flight_id' => 1
        ]);
        DB::table('flights_stops')->insert([
            'stop_id' => 2,
            'flight_id' => 1
        ]);
        DB::table('flights_stops')->insert([
            'stop_id' => 3,
            'flight_id' => 2
        ]);
        DB::table('flights_stops')->insert([
            'stop_id' => 4,
            'flight_id' => 2
        ]);
        DB::table('flights_stops')->insert([
            'stop_id' => 5,
            'flight_id' => 2
        ]);
        DB::table('flights_stops')->insert([
            'stop_id' => 6,
            'flight_id' => 3
        ]);
        DB::table('flights_stops')->insert([
            'stop_id' => 7,
            'flight_id' => 4
        ]);
        DB::table('flights_stops')->insert([
            'stop_id' => 8,
            'flight_id' => 5
        ]);
        DB::table('flights_stops')->insert([
            'stop_id' => 9,
            'flight_id' => 6
        ]);
    }
}
