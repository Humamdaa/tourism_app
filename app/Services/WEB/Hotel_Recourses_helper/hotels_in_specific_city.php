<?php

namespace App\Services\WEB\Hotel_Recourses_helper;

use App\Models\city;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class hotels_in_specific_city
{

    public function show_hotels_in_specific_city(Request $request)
    {
        $imgs = '';
        $city = $request->input('city_name');

        $ci = City::where('name', $city)->first();
        if ($ci) {
            $hotels = $ci->hotels;


            // Define the path to the directory
            $directory = public_path("hotels/$ci->name");
//return $directory;

            // Check if the directory exists
//            if (!File::exists($directory)) {
//                return redirect()->back()->with([
//                    'message' => 'Directory does not exist.'
//                ]);
//            }

            // Get all image files from the directory
            if (File::exists($directory)) {
                $images = File::files($directory);
            }
            // Check if there are any images in the directory
//            if (empty($images)) {
//                return redirect()->back()->with([
//                    'message'=>'No images found.'
//                ]);
//            }

            //each hotel has 4 photos
//            so for each hotel I take photo 1 , 5, 9
            if(!empty($images)) {
                $count = 0;
                $temp = [];
                foreach ($images as $im) {
                    if ($count == 1 || ($count - 1) % 4 == 0)
                        $temp  [$count] = basename($im);
                    $count++;
                }

                $imgs = array_values($temp);
            }
//            dd($temp);
//return $hotels;
            return view('dashboard.hotels.hotels_city')->with([
                'hotels' => $hotels,
                'city' => $ci->name,
                'imgs' => $imgs]);
        }
        return redirect()->back();

    }
}
