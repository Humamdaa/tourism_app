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
            'number' => 5,
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
            'number' => 10,
            'hotel_id' => 4,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //room in hotel 11 Hotel LA in city 2 LosAngeles
        DB::table('rooms')->insert([
            'id' => 11,
            'person_num' => 1,
            'number' => 11,
            'hotel_id' => 4,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //room in hotel 5 Hotel LB in city 2 LosAngeles
        DB::table('rooms')->insert([
            'id' => 12,
            'person_num' => 3,
            'number' => 12,
            'hotel_id' => 5,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //room in hotel 5 Hotel LB in city 2 LosAngeles
        DB::table('rooms')->insert([
            'id' => 13,
            'person_num' => 2,
            'number' => 13,
            'hotel_id' => 5,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 14,
            'person_num' => 2,
            'number' => 14,
            'hotel_id' => 5,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 15,
            'person_num' => 3,
            'number' => 15,
            'hotel_id' => 5,
            'isBooking' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //hotel 6 in paris third city
        DB::table('rooms')->insert([
            'id' => 16,
            'person_num' => 1,
            'number' => 16,
            'hotel_id' => 6,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 17,
            'person_num' => 6,
            'number' => 17,
            'hotel_id' => 6,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 18,
            'person_num' => 3,
            'number' => 18,
            'hotel_id' => 6,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////hotel 7 in paris third city
        DB::table('rooms')->insert([
            'id' => 19,
            'person_num' => 1,
            'number' => 19,
            'hotel_id' => 7,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 20,
            'person_num' => 5,
            'number' => 20,
            'hotel_id' => 7,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 21,
            'person_num' => 3,
            'number' => 21,
            'hotel_id' => 7,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////hotel 8 in paris third city

        DB::table('rooms')->insert([
            'id' => 22,
            'person_num' => 1,
            'number' => 22,
            'hotel_id' => 8,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 23,
            'person_num' => 6,
            'number' => 23,
            'hotel_id' => 8,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 24,
            'person_num' => 3,
            'number' => 24,
            'hotel_id' => 8,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        /////hotel 9 in Damascus 4th city
        DB::table('rooms')->insert([
            'id' => 25,
            'person_num' => 1,
            'number' => 25,
            'hotel_id' => 9,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 26,
            'person_num' => 6,
            'number' => 26,
            'hotel_id' => 9,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 27,
            'person_num' => 3,
            'number' => 27,
            'hotel_id' => 9,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


/////hotel 10 in Damascus 4th city
        DB::table('rooms')->insert([
            'id' => 28,
            'person_num' => 1,
            'number' => 28,
            'hotel_id' => 10,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 29,
            'person_num' => 6,
            'number' => 29,
            'hotel_id' => 10,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 30,
            'person_num' => 3,
            'number' => 30,
            'hotel_id' => 10,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



/////hotel 11 in Damascus 4th city
        DB::table('rooms')->insert([
            'id' => 31,
            'person_num' => 1,
            'number' => 31,
            'hotel_id' => 11,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 32,
            'person_num' => 6,
            'number' => 32,
            'hotel_id' => 11,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 33,
            'person_num' => 3,
            'number' => 33,
            'hotel_id' => 11,
            'isBooking' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
