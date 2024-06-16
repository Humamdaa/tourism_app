<?php

namespace Database\Seeders\Flights\Go;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightGoServicesSeederTable extends Seeder
{
    /////////////////////////////////////////////////////////////////////////////////
    /// the id must be start from id 30 to 37 for flights go
    ////////////////////////////////////////////////////////////////////////////////
    public function run(): void
    {


        //services for first flightGo
        DB::table('flights_go_services')->insert([
            'id' => 1,
            'service_id' => 30,
            'flightGo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 2,
            'service_id' => 31,
            'flightGo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 3,
            'service_id' => 32,
            'flightGo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        //services for second flightGo
        DB::table('flights_go_services')->insert([
            'id' => 4,
            'service_id' => 33,
            'flightGo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 5,
            'service_id' => 34,
            'flightGo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 6,
            'service_id' => 35,
            'flightGo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //services for third flight Go
        DB::table('flights_go_services')->insert([
            'id' => 7,
            'service_id' => 36,
            'flightGo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 8,
            'service_id' => 37,
            'flightGo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 9,
            'service_id' => 30,
            'flightGo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //services for seventh flight Go
        DB::table('flights_go_services')->insert([
            'id' => 10,
            'service_id' => 37,
            'flightGo_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 11,
            'service_id' => 36,
            'flightGo_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 12,
            'service_id' => 35,
            'flightGo_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //services for eighth flight Go
        DB::table('flights_go_services')->insert([
            'id' => 13,
            'service_id' => 34,
            'flightGo_id' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 14,
            'service_id' => 33,
            'flightGo_id' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
            'id' => 15,
            'service_id' => 32,
            'flightGo_id' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /////////////////////////////////////////////////////////
        /// flight from 22 to 25
        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 30,
            'flightGo_id' => 22,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 31,
            'flightGo_id' => 22,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 32,
            'flightGo_id' => 22,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 33,
            'flightGo_id' => 23,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 34,
            'flightGo_id' => 23,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 35,
            'flightGo_id' => 24,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 36,
            'flightGo_id' => 24,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 30,
            'flightGo_id' => 25,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 32,
            'flightGo_id' => 25,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('flights_go_services')->insert([
//            'id' => 15,
            'service_id' => 37,
            'flightGo_id' => 25,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }


}
