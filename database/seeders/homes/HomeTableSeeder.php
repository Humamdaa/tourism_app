<?php

namespace Database\Seeders\homes;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('homes')->insert([
            'id' => 1,
            'space' => 240,
            'location' => '123-456-7890',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'monthly_rent' => 200,
            'person_num' => 6,
            'rooms' => 4,
            'baths' => 2,
            'city_id' => 1, // Assuming New York has id 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('homes')->insert([
            'id' => 2,
            'space' => 200,
            'location' => '1233-456-7890',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'monthly_rent' => 100,
            'person_num' => 5,
            'rooms' => 3,
            'baths' => 2,
            'city_id' => 1, // Assuming New York has id 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
