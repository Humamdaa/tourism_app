<?php

namespace Database\Seeders\hotels;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_services')->insert([
            'id_service'=>1,
                'id_hotel'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('hotel_services')->insert([
            'id_service'=>2,
            'id_hotel'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('hotel_services')->insert([
            'id_service'=>2,
            'id_hotel'=>2,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('hotel_services')->insert([
            'id_service'=>3,
            'id_hotel'=>2,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('hotel_services')->insert([
            'id_service'=>4,
            'id_hotel'=>2,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('hotel_services')->insert([
            'id_service'=>4,
            'id_hotel'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('hotel_services')->insert([
            'id_service'=>5,
            'id_hotel'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('hotel_services')->insert([
            'id_service'=>6,
            'id_hotel'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('hotel_services')->insert([
            'id_service'=>7,
            'id_hotel'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('hotel_services')->insert([
            'id_service'=>8,
            'id_hotel'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
