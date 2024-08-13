<?php

namespace Database\Seeders\Flights\Round;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassFlightRoundSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class_flight_round')->insert([
            // FlightRound 1
            ['capacity' => 80, 'price' => 100, 'class_id' => 1, 'flightRound_id' => 1],
            ['capacity' => 10, 'price' => 120, 'class_id' => 2, 'flightRound_id' => 1],
            ['capacity' => 10, 'price' => 130, 'class_id' => 3, 'flightRound_id' => 1],
            // FlightRound 2
            ['capacity' => 80, 'price' => 100, 'class_id' => 1, 'flightRound_id' => 2],
            ['capacity' => 10, 'price' => 110, 'class_id' => 2, 'flightRound_id' => 2],
            ['capacity' => 10, 'price' => 135, 'class_id' => 3, 'flightRound_id' => 2],
            // FlightRound 3
            ['capacity' => 80, 'price' => 100, 'class_id' => 1, 'flightRound_id' => 3],
            ['capacity' => 10, 'price' => 110, 'class_id' => 2, 'flightRound_id' => 3],
            ['capacity' => 10, 'price' => 125, 'class_id' => 3, 'flightRound_id' => 3],
            // FlightRound 4
            ['capacity' => 80, 'price' => 110, 'class_id' => 1, 'flightRound_id' => 4],
            ['capacity' => 10, 'price' => 150, 'class_id' => 2, 'flightRound_id' => 4],
            ['capacity' => 10, 'price' => 160, 'class_id' => 3, 'flightRound_id' => 4],
            // FlightRound 5
            ['capacity' => 80, 'price' => 120, 'class_id' => 1, 'flightRound_id' => 5],
            ['capacity' => 10, 'price' => 130, 'class_id' => 2, 'flightRound_id' => 5],
            ['capacity' => 10, 'price' => 140, 'class_id' => 3, 'flightRound_id' => 5],
            // FlightRound 6
            ['capacity' => 80, 'price' => 150, 'class_id' => 1, 'flightRound_id' => 6],
            ['capacity' => 10, 'price' => 160, 'class_id' => 2, 'flightRound_id' => 6],
            ['capacity' => 10, 'price' => 170, 'class_id' => 3, 'flightRound_id' => 6],
            // FlightRound 7
            ['capacity' => 80, 'price' => 80, 'class_id' => 1, 'flightRound_id' => 7],
            ['capacity' => 10, 'price' => 100, 'class_id' => 2, 'flightRound_id' => 7],
            ['capacity' => 10, 'price' => 130, 'class_id' => 3, 'flightRound_id' => 7],
        ]);
    }
}
