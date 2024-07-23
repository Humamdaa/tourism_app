<?php

namespace Database\Seeders\Flights\Round;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightRoundSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        4- Damascus   1-NewYork
        DB::table('flightsround')->insert([
            [
                'id' => 1,
                'dateGo' => '2025-08-10',
                'takeoffGo' => '08:30:00',
                'landingGo' => '12:30:00',
                'durationGo' => '4:00',
                'dateBack' => '2025-08-15',
                'takeoffBack' => '10:30:00',
                'landingBack' => '14:30:00',
                'durationBack' => '4:00',
                'capacity' => 100,
                'office_id' => 1,
                'from_city_id' => 4,
                'to_city_id' => 1,
            ],
            [
                'id' => 2,
                'dateGo' => '2025-08-10',
                'takeoffGo' => '08:30:00',
                'landingGo' => '12:30:00',
                'durationGo' => '4:00',
                'dateBack' => '2025-08-15',
                'takeoffBack' => '10:30:00',
                'landingBack' => '14:30:00',
                'durationBack' => '4:00',
                'capacity' => 100,
                'office_id' => 2,
                'from_city_id' => 4,
                'to_city_id' => 1,
            ],
            [
                'id' => 3,
                'dateGo' => '2025-08-10',
                'takeoffGo' => '08:30:00',
                'landingGo' => '12:30:00',
                'durationGo' => '4:00',
                'dateBack' => '2025-08-15',
                'takeoffBack' => '10:30:00',
                'landingBack' => '14:30:00',
                'durationBack' => '4:00',
                'capacity' => 100,
                'office_id' => 3,
                'from_city_id' => 4,
                'to_city_id' => 1,
            ],
            [
                'id' => 4,
                'dateGo' => '2025-09-01',
                'takeoffGo' => '11:00:00',
                'landingGo' => '14:15:00',
                'durationGo' => '4:15',
                'dateBack' => '2025-09-05',
                'takeoffBack' => '11:00:00',
                'landingBack' => '15:00:00',
                'durationBack' => '4:00',
                'capacity' => 100,
                'office_id' => 2,
                'from_city_id' => 4,
                'to_city_id' => 1,
            ],
            [
                'id' => 5,
                'dateGo' => '2025-10-10',
                'takeoffGo' => '07:00:00',
                'landingGo' => '11:20:00',
                'durationGo' => '4:20',
                'dateBack' => '2025-10-15',
                'takeoffBack' => '11:00:00',
                'landingBack' => '15:00:00',
                'durationBack' => '4:00',
                'capacity' => 100,
                'office_id' => 3,
                'from_city_id' => 4,
                'to_city_id' => 1,
            ],
            [
                'id' => 6,
                'dateGo' => '2025-11-11',
                'takeoffGo' => '17:10:00',
                'landingGo' => '21:40:00',
                'durationGo' => '4:30',
                'dateBack' => '2025-11-16',
                'takeoffBack' => '11:00:00',
                'landingBack' => '15:00:00',
                'durationBack' => '4:00',
                'capacity' => 100,
                'office_id' => 1,
                'from_city_id' => 4,
                'to_city_id' => 1,
            ],
            [
                'id' => 7,
                'dateGo' => '2025-11-11',
                'takeoffGo' => '10:00:00',
                'landingGo' => '14:30:00',
                'durationGo' => '4:30',
                'dateBack' => '2025-11-16',
                'takeoffBack' => '9:00:00',
                'landingBack' => '13:00:00',
                'durationBack' => '4:00',
                'capacity' => 100,
                'office_id' => 1,
                'from_city_id' => 4,
                'to_city_id' => 1,
            ]
        ]);

    }
}
