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
            'capacity' => 85,
            'price' => 150,
            'class_id' => 1,
            'flightGo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 2,
            'capacity' => 10,
            'price' => 175,
            'class_id' => 2,
            'flightGo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 3,
            'capacity' => 200,
            'price' => 5,
            'class_id' => 1,
            'flightGo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //classes for second flight
        DB::table('class_flight_go')->insert([
            'id' => 4,
            'capacity' => 70,
            'price' => 130,
            'class_id' => 1,
            'flightGo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 5,
            'capacity' => 20,
            'price' => 185,
            'class_id' => 2,
            'flightGo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 6,
            'capacity' => 10,
            'price' => 205,
            'class_id' => 3,
            'flightGo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //classes for third flight
        DB::table('class_flight_go')->insert([
            'id' => 7,
            'capacity' => 60,
            'price' => 220,
            'class_id' => 1,
            'flightGo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 8,
            'capacity' => 20,
            'price' => 240,
            'class_id' => 2,
            'flightGo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 9,
            'capacity' => 20,
            'price' => 270,
            'class_id' => 3,
            'flightGo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //classes for seventh flight
        DB::table('class_flight_go')->insert([
            'id' => 10,
            'capacity' => 60,
            'price' => 220,
            'class_id' => 1,
            'flightGo_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 11,
            'capacity' => 20,
            'price' => 240,
            'class_id' => 2,
            'flightGo_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 12,
            'capacity' => 20,
            'price' => 270,
            'class_id' => 3,
            'flightGo_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        //classes for eighth flight
        DB::table('class_flight_go')->insert([
            'id' => 13,
            'capacity' => 80,
            'price' => 100,
            'class_id' => 1,
            'flightGo_id' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 14,
            'capacity' => 10,
            'price' => 115,
            'class_id' => 2,
            'flightGo_id' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('class_flight_go')->insert([
            'id' => 15,
            'capacity' => 10,
            'price' => 150,
            'class_id' => 3,
            'flightGo_id' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
