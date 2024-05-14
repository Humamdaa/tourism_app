<?php

namespace Database\Seeders\hotels;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //hotel 1 Hotel NYC in city 1 NewYork
        DB::table('rooms')->insert([
            'id' => 1,
            'person_num' => 3,
            'number' => 1,
            'hotel_id' => 1,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //room in hotel 2 Hotel NYC in city 1 in NewYork
        DB::table('rooms')->insert([
            'id' => 2,
            'person_num' => 4,
            'number' => 2,
            'hotel_id' => 1,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //room in hotel 2 NYCE in city 1 NewYork
        DB::table('rooms')->insert([
            'id' => 3,
            'person_num' => 1,
            'number' => 3,
            'hotel_id' => 2,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //room in hotel 2 Hotel NYCE in city 1 in NewYork
        DB::table('rooms')->insert([
            'id' => 4,
            'person_num' => 6,
            'number' => 4,
            'hotel_id' => 2,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

// room in hotel 3 in city 1 NewYork
        DB::table('rooms')->insert([
            'id' => 5,
            'person_num' => 6,
            'number'=>5,
            'hotel_id' => 3,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //**************************************************
        //room in hotel 10 Hotel LA in city 2 LosAngeles
        DB::table('rooms')->insert([
            'id' => 10,
            'person_num' => 4,
            'number' => 5,
            'hotel_id' => 4,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //room in hotel 11 Hotel LA in city 2 LosAngeles
        DB::table('rooms')->insert([
            'id' => 11,
            'person_num' => 1,
            'number' => 6,
            'hotel_id' => 4,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //room in hotel 12 Hotel LB in city 2 LosAngeles
        DB::table('rooms')->insert([
            'id' => 12,
            'person_num' => 3,
            'number' => 7,
            'hotel_id' => 5,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //room in hotel 13 Hotel LB in city 2 LosAngeles
        DB::table('rooms')->insert([
            'id' => 13,
            'person_num' => 2,
            'number' => 8,
            'hotel_id' => 5,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 14,
            'person_num' => 2,
            'number' => 8,
            'hotel_id' => 5,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 15,
            'person_num' => 3,
            'number' => 9,
            'hotel_id' => 5,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
