<?php

namespace Database\Seeders\Flights\Go;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassFlightGoSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //classes for the first flight
        DB::table('class_flight_go')->insert([
            'id' => 1,
            'capacity' => 95,
            'price' => 150,
            'class_id' => 1,
            'flightGo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 2,
            'capacity' => 15,
            'price' => 175,
            'class_id' => 2,
            'flightGo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 3,
            'capacity' => 75,
            'price' => 95,
            'class_id' => 1,
            'flightGo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //classes for second flight
        DB::table('class_flight_go')->insert([
            'id' => 4,
            'capacity' => 7,
            'price' => 130,
            'class_id' => 1,
            'flightGo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 5,
            'capacity' => 10,
            'price' => 95,
            'class_id' => 2,
            'flightGo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 6,
            'capacity' => 83,
            'price' => 95,
            'class_id' => 3,
            'flightGo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //classes for third flight
        DB::table('class_flight_go')->insert([
            'id' => 7,
            'capacity' => 15,
            'price' => 220,
            'class_id' => 1,
            'flightGo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 8,
            'capacity' => 20,
            'price' => 190,
            'class_id' => 2,
            'flightGo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 9,
            'capacity' => 65,
            'price' => 150,
            'class_id' => 3,
            'flightGo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
