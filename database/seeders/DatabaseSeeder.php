<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\hotels\InsideHotelPage\getHotelComments;
use Database\Seeders\city\CitiesTableSeeder;
use Database\Seeders\Flights\ClassesSeederTable;
use Database\Seeders\Flights\Go\ClassFlightGoSeederTable;
use Database\Seeders\Flights\Go\FlightGoServicesSeederTable;
use Database\Seeders\Flights\Go\flightsGoStopsSeederTable;
use Database\Seeders\Flights\Go\FlightsGoTableSeeder;

use Database\Seeders\Flights\ServicesSeederTable;
use Database\Seeders\Flights\stopsSeederTable;
use Database\Seeders\Flights\OfficeTableSeeder;

use Database\Seeders\Flights\Round\ClassFlightRoundSeederTable;
use Database\Seeders\Flights\Round\FlightRoundSeederTable;
use Database\Seeders\Flights\Round\servicesFlightRoundSeederTable;
use Database\Seeders\Flights\Round\stopsFlightRoundSeederTable;
use Database\Seeders\hotels\BookRoomHotelTableSeeder;
use Database\Seeders\hotels\HotelCommentTableSeeder;
use Database\Seeders\hotels\HotelPhotosTableSeeder;
use Database\Seeders\hotels\HotelTableSeeder;
use Database\Seeders\hotels\RoomTableSeeder;
use Database\Seeders\hotels\HotelServicesTableSeeder;
use Database\Seeders\hotels\ServicesTableSeeder;
use Database\Seeders\homes\HomeTableSeeder;
use Database\Seeders\homes\BookHomeTableSeeder;
use Database\Seeders\user\UserTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Disable foreign key checks
        //DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // Truncate both tables to remove existing data

        DB::table('users')->delete();
        DB::table('offices')->delete();
        DB::table('cities')->delete();
        DB::table('hotels')->delete();
        DB::table('rooms')->delete();
        DB::table('book_room_hotel')->delete();
        DB::table('services')->delete();
        DB::table('hotel_services')->delete();
        DB::table('hotel_comments')->delete();
        DB::table('hotel_photos')->delete();

        //homes
        DB::table('homes')->delete();
        DB::table('book_home_user_pivot')->delete();
        DB::table('classes')->delete();
        DB::table('flightsgo')->delete();
        DB::table('class_flight_go')->delete();
        DB::table('flights_go_services')->delete();
        DB::table('flights_go_stops')->delete();
        DB::table('stops')->delete();

        //round flights
        DB::table('flightsround')->delete();
        DB::table('flights_round_stops')->delete();
        DB::table('class_flight_round')->delete();
        DB::table('flights_round_services')->delete();

//        populate the tables with new data
        $this->call([
            UserTableSeeder::class,
            CitiesTableSeeder::class,
            HotelTableSeeder::class,
            RoomTableSeeder::class,
            BookRoomHotelTableSeeder::class,
            ServicesTableSeeder::class,
            HotelServicesTableSeeder::class,
            HotelCommentTableSeeder::class,
            HotelPhotosTableSeeder::class,
            // home
            HomeTableSeeder::class,
            BookHomeTableSeeder::class,

            //for go and round flight
            ClassesSeederTable::class,
            OfficeTableSeeder::class,
            ServicesSeederTable::class,
            stopsSeederTable::class,

////////////seeder flightsGo
            FlightsGoTableSeeder::class,
            ClassFlightGoSeederTable::class,
            FlightGoServicesSeederTable::class,
            flightsGoStopsSeederTable::class,

///////////seeder flightsRound
            FlightRoundSeederTable::class,
            ClassFlightRoundSeederTable::class,
            servicesFlightRoundSeederTable::class,
            stopsFlightRoundSeederTable::class,
        ]);
    }
}
