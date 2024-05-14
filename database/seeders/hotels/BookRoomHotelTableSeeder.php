<?php

namespace Database\Seeders\hotels;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookRoomHotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //        'start','end','id_room','id_hotel','id_user'

        DB::table('book_room_hotel')->insert([
            'id' => 1,
            'start' => '2024-06-15',
            'end' => '2024-06-20',
            "persons" => 1,
            'id_room' => 2,
            'id_hotel' => 1,
            'id_user' => 1,
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('book_room_hotel')->insert([
            'id' => 2,
            'start' => '2024-06-10',
            'end' => '2024-06-14',
            "persons" => 1,

            'id_room' => 4,
            'id_hotel' => 2,
            'id_user' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('book_room_hotel')->insert([
            'id' => 3,
            'start' => '2024-07-10',
            'end' => '2024-07-14',
            "persons" => 1,

            'id_room' => 5,
            'id_hotel' => 3,
            'id_user' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('book_room_hotel')->insert([
            'id' => 4,
            'start' => '2024-05-15',
            'end' => '2024-05-20',
            "persons" => 1,

            'id_room' => 11,
            'id_hotel' => 4,
            'id_user' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('book_room_hotel')->insert([
            'id' => 5,
            'start' => '2024-05-05',
            'end' => '2024-05-8',
            "persons" => 1,

            'id_room' => 13,
            'id_hotel' => 5,
            'id_user' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('book_room_hotel')->insert([
            'id' => 6,
            'start' => '2024-03-01',
            'end' => '2024-03-10',
            "persons" => 1,

            'id_room' => 15,
            'id_hotel' => 5,
            'id_user' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('book_room_hotel')->insert([
            'id' => 7,
            'start' => '2024-04-01',
            'end' => '2024-04-10',
            "persons" => 1,

            'id_room' => 15,
            'id_hotel' => 5,
            'id_user' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
