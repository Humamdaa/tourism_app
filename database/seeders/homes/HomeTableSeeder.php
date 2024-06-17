<?php

namespace Database\Seeders\homes;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;
class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $homes = [
            [
                'id' => 1,
                'space' => 240,
                'location' => '123-456-7890',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'monthly_rent' => 200,
                'person_num' => 6,
                'rooms' => 4,
                'baths' => 2,
                'user_owner_id'=>1,
                'city_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'space' => 200,
                'location' => '1233-456-7890',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'monthly_rent' => 100,
                'person_num' => 5,
                'rooms' => 3,
                'baths' => 2,
                'user_owner_id'=>1,
                'city_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // ... Add more homes here
        ];

        for ($i = 3; $i <= 22; $i++) {
            $homes[] = [
                'id' => $i,
                'space' => rand(70, 999),
                'location' => '1245-' . rand(100, 999) . '-' . rand(1000, 9999),
                'description' => 'A cozy and welcoming space located in a convenient neighborhood.',
                'monthly_rent' => rand(150, 600),
                'person_num' => rand(2, 7),
                'rooms' => rand(2, 5),
                'baths' => rand(1, 3),
                'user_owner_id'=>rand(1,2),
                'city_id' => rand(1, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('homes')->insert($homes);
    }
}
