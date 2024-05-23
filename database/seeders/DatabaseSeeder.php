<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\hotels\InsideHotelPage\getHotelComments;
use Database\Seeders\city\CitiesTableSeeder;
use Database\Seeders\Flights\Go\ClassesSeederTable;
use Database\Seeders\Flights\Go\ClassFlightGoSeederTable;
use Database\Seeders\Flights\Go\FlightGoServicesSeederTable;
use Database\Seeders\Flights\Go\FlightsGoTableSeeder;
use Database\Seeders\Flights\Go\ServicesSeederTable;
use Database\Seeders\Flights\OfficeTableSeeder;
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
<<<<<<< HEAD
        //homes
        DB::table('homes')->delete();
        DB::table('book_home_user_pivot')->delete();

=======
        DB::table('classes')->delete();
        DB::table('flightsgo')->delete();
        DB::table('class_flight_go')->delete();
        DB::table('flights_go_services')->delete();
>>>>>>> 7b623bb708e9c7f9a88d78a0ae34b6fd3a40dcb6


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
<<<<<<< HEAD
            // home
            HomeTableSeeder::class,
            BookHomeTableSeeder::class,
=======
////////////seeder flightsGo
            ClassesSeederTable::class,
            OfficeTableSeeder::class,
            FlightsGoTableSeeder::class,
            ClassFlightGoSeederTable::class,
            ServicesSeederTable::class,
            FlightGoServicesSeederTable::class,
            // Add more seeders here if needed
>>>>>>> 7b623bb708e9c7f9a88d78a0ae34b6fd3a40dcb6
        ]);
    }
}
