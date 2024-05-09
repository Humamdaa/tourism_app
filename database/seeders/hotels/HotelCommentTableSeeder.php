<?php

namespace Database\Seeders\hotels;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class HotelCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_comments')->insert([
            'comment' => 'great hotel',
            'user_id' => 1,
            'hotel_id' => 1,
            'created_at' => '2023-6-5',
            'updated_at' => '2023-6-5'
        ]);

        DB::table('hotel_comments')->insert([
            'comment' => 'not bad , but the waiter must be faster',
            'user_id' => 1,
            'hotel_id' => 1,
            'created_at' => '2023-6-5',
            'updated_at' => '2023-6-5'
        ]);
        DB::table('hotel_comments')->insert([
            'comment' => 'recommended hotel',
            'user_id' => 2,
            'hotel_id' => 2,
            'created_at' => '2023-3-5',
            'updated_at' => '2023-3-5'
        ]);
        DB::table('hotel_comments')->insert([
            'comment' => 'the services is very good',
            'user_id' => 2,
            'hotel_id' => 2,
            'created_at' => '2023-3-5',
            'updated_at' => '2023-3-5'
        ]);
    }
}
