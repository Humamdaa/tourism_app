<?php

namespace App\Http\Controllers\Web\Hotel;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HotelRecoursesController extends Controller
{
    public function show_hotels_in_specific_city(Request $request)
    {
        $city = $request->input('city_name');

        $ci = City::where('name', $city)->first();
        if ($ci) {
            $hotels = $ci->hotels;


            // Define the path to the directory
            $directory = public_path("hotels/$ci->name");
//return $directory;


            // Get all image files from the directory
//            $images = $directory . '/*.jpg';
            $images = File::files($directory);

            // Check if there are any images in the directory
            if (empty($images)) {
                return 'No images found.';
            }
//dd($images);
            for($i = 0; $i < $images.length();$i++){

            }
            // Select a random image from the array
            $randomImage = $images[array_rand($images)];

            // Store the random image filename
            $randomImageName = basename($randomImage);

//            return $randomImageName;
//            return $hotels;
            return view('dashboard.hotels.hotels_city')->with(['hotels' => $hotels, 'img' => $randomImageName]);
        }
        return redirect()->back();
    }

    public function search_city(Request $request)
    {
        $input = $request->input('input');
        $tr = new TranslateMessages();

        $validator = Validator::make(['input' => $input], [
            'input' => 'required|min:1', // Ensure that the input is not empty
        ]);

        if ($validator->fails()) {
//            return 'error';
            return redirect()->back()->with('result', $tr->translate($validator));
        }

        $cities = city::where('name', 'LIKE', "%$input%")->get();
        return redirect()->back()->with('result', $cities);

    }

    public function index()
    {
        $cities = city::all();
        return view('dashboard.hotels.cities')->with('cities', $cities);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
