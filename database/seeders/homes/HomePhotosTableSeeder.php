<?php

namespace Database\Seeders\homes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //home 1
        DB::table('home_photos')->insert([
            'id' => 1,
            'img' => 'newYork1.jpg',
            'home_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_photos')->insert([
            'id' => 2,
            'img' => 'newYork1-1.jpg',
            'home_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 3,
            'img' => 'newYork1-2.jpg',
            'home_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 4,
            'img' => 'newYork1-3.jpg',
            'home_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //home 2
        DB::table('home_photos')->insert([
            'id' => 5,
            'img' => 'newYork2.jpg',
            'home_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 6,
            'img' => 'newYork2-1.jpg',
            'home_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 7,
            'img' => 'newYork2-2.jpg',
            'home_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 8,
            'img' => 'newYork2-3.jpg',
            'home_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //home 3
        DB::table('home_photos')->insert([
            'id' => 9,
            'img' => 'newYork3.jpg',
            'home_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 10,
            'img' => 'newYork3-1.jpg',
            'home_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 11,
            'img' => 'newYork3-2.jpg',
            'home_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_photos')->insert([
            'id' => 12,
            'img' => 'newYork3-3.jpg',
            'home_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        //home 9 in Damascus
        DB::table('home_photos')->insert([
            'id' => 13,
            'img' => 'damascus1.jpg',
            'home_id' => 9,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 14,
            'img' => 'damascus1-1.jpg',
            'home_id' => 9,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 15,
            'img' => 'damascus1-2.jpg',
            'home_id' => 9,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 16,
            'img' => 'damascus1-3.jpg',
            'home_id' => 9,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        //home 4 first home in LosAngeles city 2
        DB::table('home_photos')->insert([
            'id' => 17,
            'img' => 'losangeles4.jpg',
            'home_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 18,
            'img' => 'losangeles4-1.jpg',
            'home_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 19,
            'img' => 'losangeles4-2.jpg',
            'home_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 20,
            'img' => 'losangeles4-3.jpg',
            'home_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //home 4 first home in LosAngeles
        DB::table('home_photos')->insert([
            'id' => 21,
            'img' => 'losangeles5.jpg',
            'home_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 22,
            'img' => 'losangeles5-1.jpg',
            'home_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 23,
            'img' => 'losangeles5-2.jpg',
            'home_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('home_photos')->insert([
            'id' => 24,
            'img' => 'losangeles5-3.jpg',
            'home_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);



    }
}
