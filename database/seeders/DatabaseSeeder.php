<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\hotels\InsideHotelPage\getHotelComments;
use Database\Seeders\city\CitiesTableSeeder;
use Database\Seeders\hotels\BookRoomHotelTableSeeder;
use Database\Seeders\hotels\HotelCommentTableSeeder;
use Database\Seeders\hotels\HotelPhotosTableSeeder;
use Database\Seeders\hotels\HotelTableSeeder;
use Database\Seeders\hotels\RoomTableSeeder;
use Database\Seeders\hotels\HotelServicesTableSeeder;
use Database\Seeders\hotels\ServicesTableSeeder;
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
        DB::table('cities')->delete();
        DB::table('hotels')->delete();
        DB::table('rooms')->delete();
        DB::table('book_room_hotel')->delete();
        DB::table('services')->delete();
        DB::table('hotel_services')->delete();
        DB::table('hotel_comments')->delete();
        DB::table('hotel_photos')->delete();

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

            // Add more seeders here if needed
        ]);
    }
}
