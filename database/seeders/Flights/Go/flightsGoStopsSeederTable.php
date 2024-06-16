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
        DB::table('flights_go_stops')->insert([
            'stop_id' => 1,
            'flightGo_id' => 1
        ]);
        DB::table('flights_go_stops')->insert([
            'stop_id' => 2,
            'flightGo_id' => 1
        ]);
        DB::table('flights_go_stops')->insert([
            'stop_id' => 3,
            'flightGo_id' => 2
        ]);
        DB::table('flights_go_stops')->insert([
            'stop_id' => 4,
            'flightGo_id' => 2
        ]);
        DB::table('flights_go_stops')->insert([
            'stop_id' => 5,
            'flightGo_id' => 2
        ]);
        DB::table('flights_go_stops')->insert([
            'stop_id' => 6,
            'flightGo_id' => 3
        ]);
        DB::table('flights_go_stops')->insert([
            'stop_id' => 7,
            'flightGo_id' => 4
        ]);
        DB::table('flights_go_stops')->insert([
            'stop_id' => 8,
            'flightGo_id' => 5
        ]);
        DB::table('flights_go_stops')->insert([
            'stop_id' => 9,
            'flightGo_id' => 6
        ]);

        DB::table('flights_go_stops')->insert([
            'stop_id' => 1,
            'flightGo_id' => 23
        ]);


        DB::table('flights_go_stops')->insert([
            'stop_id' => 8,
            'flightGo_id' => 24
        ]);
        DB::table('flights_go_stops')->insert([
            'stop_id' => 7,
            'flightGo_id' => 24
        ]);


        DB::table('flights_go_stops')->insert([
            'stop_id' => 3,
            'flightGo_id' => 25
        ]);

        DB::table('flights_go_stops')->insert([
            'stop_id' => 4,
            'flightGo_id' => 25
        ]);

        DB::table('flights_go_stops')->insert([
            'stop_id' => 5,
            'flightGo_id' => 25
        ]);
    }
}
