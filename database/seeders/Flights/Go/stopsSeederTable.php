<?php

namespace Database\Seeders\Flights\Go;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class stopsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stops')->insert([
            'id' => 1,
            'name' => 'aa'
        ]);

        DB::table('stops')->insert([
            'id' => 2,
            'name' => 'bb'
        ]);

        DB::table('stops')->insert([
            'id' => 3,
            'name' => 'cc'
        ]);
        DB::table('stops')->insert([
            'id' => 4,
            'name' => 'cc'
        ]);

        DB::table('stops')->insert([
            'id' => 5,
            'name' => 'dd'
        ]);
        DB::table('stops')->insert([
            'id' => 6,
            'name' => 'ee'
        ]);
        DB::table('stops')->insert([
            'id' => 7,
            'name' => 'ff'
        ]);
        DB::table('stops')->insert([
            'id' => 8,
            'name' => 'gg'
        ]);
        DB::table('stops')->insert([
            'id' => 9,
            'name' => 'ee'
        ]);
    }
}
