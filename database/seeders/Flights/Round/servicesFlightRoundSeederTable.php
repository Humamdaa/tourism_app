<?php

namespace Database\Seeders\Flights\Round;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class servicesFlightRoundSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['flightRound_id' => 1, 'service_id' => 30],
            ['flightRound_id' => 1, 'service_id' => 31],
            ['flightRound_id' => 1, 'service_id' => 32],
            ['flightRound_id' => 2, 'service_id' => 33],
            ['flightRound_id' => 2, 'service_id' => 34],
            ['flightRound_id' => 2, 'service_id' => 35],
            ['flightRound_id' => 3, 'service_id' => 36],
            ['flightRound_id' => 3, 'service_id' => 37],
            ['flightRound_id' => 3, 'service_id' => 30],
            ['flightRound_id' => 4, 'service_id' => 31],
            ['flightRound_id' => 4, 'service_id' => 32],
            ['flightRound_id' => 4, 'service_id' => 33],
            ['flightRound_id' => 5, 'service_id' => 34],
            ['flightRound_id' => 5, 'service_id' => 35],
            ['flightRound_id' => 6, 'service_id' => 36],
            ['flightRound_id' => 6, 'service_id' => 37],
            ['flightRound_id' => 6, 'service_id' => 30],
        ];

        DB::table('flights_round_services')->insert($data);
    }
}
