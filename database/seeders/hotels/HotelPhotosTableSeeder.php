<?php

namespace Database\Seeders\hotels;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //hotel 1
        DB::table('hotel_photos')->insert([
            'id' => 1,
            'img' => 'newYork1.jpg',
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('hotel_photos')->insert([
            'id' => 2,
            'img' => 'newYork1-1.jpg',
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 3,
            'img' => 'newYork1-2.jpg',
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 4,
            'img' => 'newYork1-3.jpg',
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //hotel 2
        DB::table('hotel_photos')->insert([
            'id' => 5,
            'img' => 'newYork2.jpg',
            'hotel_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 6,
            'img' => 'newYork2-1.jpg',
            'hotel_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 7,
            'img' => 'newYork2-2.jpg',
            'hotel_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 8,
            'img' => 'newYork2-3.jpg',
            'hotel_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //hotel 3
        DB::table('hotel_photos')->insert([
            'id' => 9,
            'img' => 'newYork3.jpg',
            'hotel_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 10,
            'img' => 'newYork3-1.jpg',
            'hotel_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 11,
            'img' => 'newYork3-2.jpg',
            'hotel_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('hotel_photos')->insert([
            'id' => 12,
            'img' => 'newYork3-3.jpg',
            'hotel_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        //hotel 9 in Damascus
        DB::table('hotel_photos')->insert([
            'id' => 13,
            'img' => 'damascus1.jpg',
            'hotel_id' => 9,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 14,
            'img' => 'damascus1-1.jpg',
            'hotel_id' => 9,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 15,
            'img' => 'damascus1-2.jpg',
            'hotel_id' => 9,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 16,
            'img' => 'damascus1-3.jpg',
            'hotel_id' => 9,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        //hotel 4 first hotel in LosAngeles city 2
        DB::table('hotel_photos')->insert([
            'id' => 17,
            'img' => 'losangeles4.jpg',
            'hotel_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 18,
            'img' => 'losangeles4-1.jpg',
            'hotel_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 19,
            'img' => 'losangeles4-2.jpg',
            'hotel_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 20,
            'img' => 'losangeles4-3.jpg',
            'hotel_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //hotel 4 first hotel in LosAngeles
        DB::table('hotel_photos')->insert([
            'id' => 21,
            'img' => 'losangeles5.jpg',
            'hotel_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 22,
            'img' => 'losangeles5-1.jpg',
            'hotel_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 23,
            'img' => 'losangeles5-2.jpg',
            'hotel_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('hotel_photos')->insert([
            'id' => 24,
            'img' => 'losangeles5-3.jpg',
            'hotel_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);



    }
}
