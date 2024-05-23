<?php

namespace Database\Seeders\hotels;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ///////////////////////////////////////////////////////////////////////////////
        /// there are seeder for flight go services
        /// stats from id 30
        /// and for flight round services starts from id 60
        /// ///////////////////////////////////////////////////////////////////////////
        DB::table('services')->insert([
            'id' => 1,
            'name' => 'wifi',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('services')->insert([
            'id' => 2,
            'name' => 'breakfast',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('services')->insert([

            'id' => 3,
            'name' => 'launch',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('services')->insert([

            'id' => 4,
            'name' => 'dinner',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('services')->insert([

            'id' => 5,
            'name' => 'parking',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('services')->insert([

            'id' => 6,
            'name' => 'condition',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('services')->insert([
            'id' => 7,
            'name' => 'Laundry Services',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('services')->insert([
            'id' => 8,
            'name' => 'Fitness Center',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('services')->insert([

            'id' => 9,
            'name' => 'Concierge Services',
        ]);
        DB::table('services')->insert([

            'id' => 10,
            'name' => 'pool',
        ]);
    }
}
