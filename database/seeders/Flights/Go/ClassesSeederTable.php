<?php

namespace Database\Seeders\Flights\Go;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->insert([
            'id'=>1,
            'name'=>'Economy',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('classes')->insert([
            'id'=>2,
            'name'=>'Business',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('classes')->insert([
            'id'=>3,
            'name'=>'First class',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
