<?php

namespace Database\Seeders\homes;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookHomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_home_user_pivot')->insert([
            'id' => 1,
            'start' => '2024-08-15',
            'end' => '2024-09-20',
            'user_id' => 1,
            'home_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),


        ]);

        DB::table('book_home_user_pivot')->insert([
            'id' => 2,
            'start' => '2024-06-15',
            'end' => '2024-06-20',
            'user_id' => 2,
            'home_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),


        ]);

        DB::table('book_home_user_pivot')->insert([
            'id' => 3,
            'start' => '2024-06-15',
            'end' => '2024-06-20',
            'user_id' => 2,
            'home_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),


        ]);
    }
}
