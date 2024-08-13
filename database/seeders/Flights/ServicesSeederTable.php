<?php

namespace Database\Seeders\Flights;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /////////////////////////////////////////////////////////////////////////////////
        /// the id must be start from id 30  for flights go
        ////////////////////////////////////////////////////////////////////////////////
        DB::table('services')->insert([
            'id' => 30,
            'name' => 'wifi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('services')->insert([
            'id' => 31,
            'name' => 'meals',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('services')->insert([
            'id' => 32,
            'name' => 'Beverages',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('services')->insert([
            'id' => 33,
            'name' => 'Entertainment',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('services')->insert([
            'id' => 34,
            'name' => 'extra legroom seats',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('services')->insert([
            'id' => 35,
            'name' => 'onboard childcare facilities',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('services')->insert([
            'id' => 36,
            'name' => 'assistance for passengers with disabilities or special needs.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('services')->insert([
            'id' => 37,
            'name' => 'special meals',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
