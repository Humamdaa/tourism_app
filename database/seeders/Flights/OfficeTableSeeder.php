<?php

namespace Database\Seeders\Flights;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //offices in damascus
        DB::table('offices')->insert([
            'id' => 1,
            'name' => 'Damascus Travel Agency',
            'city_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offices')->insert([
            'id' => 2,
            'name' => 'Syrian Airlines',
            'city_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offices')->insert([
            'id' => 3,
            'name' => 'Fly Baghdad Airlines',
            'city_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offices')->insert([
            'id' => 4,
            'name' => 'Cham Wings Airlines',
            'city_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);


//offices in los angeles
        DB::table('offices')->insert([
            'id' => 5,
            'name' => 'Los Angeles Airlines',
            'city_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offices')->insert([
            'id' => 6,
            'name' => 'WeWork Offices',
            'city_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offices')->insert([
            'id' => 7,
            'name' => 'Office Spaces',
            'city_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offices')->insert([
            'id' => 8,
            'name' => 'latam Airlines',
            'city_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);


//offices in new york
        DB::table('offices')->insert([
            'id' => 9,
            'name' => 'New York Airways',
            'city_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offices')->insert([
            'id' => 10,
            'name' => 'WeWork Offices',
            'city_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offices')->insert([
            'id' => 11,
            'name' => 'LiquidSpace',
            'city_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
