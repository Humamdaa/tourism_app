<?php

namespace Database\Seeders\Flights\Round;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class stopsFlightRoundSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flightsRoundStops = [
            [
                'flightRound_id' => 1,
                'stop_id' => 1,
            ],
            [
                'flightRound_id' => 1,
                'stop_id' => 3,
            ],
            [
                'flightRound_id' => 2,
                'stop_id' => 2,
            ],
            [
                'flightRound_id' => 2,
                'stop_id' => 4,
            ],
            [
                'flightRound_id' => 2,
                'stop_id' => 6,
            ],

            [
                'flightRound_id' => 3,
                'stop_id' => 7,
            ],
        ];

        DB::table('flights_round_stops')->insert($flightsRoundStops);

    }
}
