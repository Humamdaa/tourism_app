<?php

namespace App\Http\Controllers\Web\City;

use App\Http\Controllers\Controller;
use App\Models\city;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\translate\TranslateMessages;
use Illuminate\Support\Facades\File;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();

        return view('dashboard.city.city', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.city.create_city');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tr = new TranslateMessages();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'information' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'photos' => 'array|max:4',
            'photos.*' => 'image|mimes:jpg|max:2048'
        ]);
        // Handle validation failures
        if ($validator->fails()) {
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->with('error', $tr->translate($validator->errors()->first()))
                    ->withInput();
            }
        }

        $cityCount = City::count();

        // Create a new city
        $city = new City();
        $city->name = $request->name;
        $city->population = $request->information;
        $city->latitude = $request->latitude;
        $city->longitude = $request->longitude;
        $city->save();

        $cityDirectory = 'E:\codelaravel\tourism\public\Admin_dashboard\assets\cities';
//        if (!File::exists($cityDirectory)) {
//            File::makeDirectory($cityDirectory, 0755, true);
//        }

        // Handle photo uploads
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            $photoCounter = 1; // To number photos sequentially

            foreach ($photos as $photo) {
                // Set the photo name
                if ($photoCounter == 1)
                    $photoName = $city->name . '.' . $photo->getClientOriginalExtension();
                else {
                    $photoName = 'OIP_' . (5 + $cityCount + ($photoCounter - 2)) . '.' . $photo->getClientOriginalExtension();
                }
                $photoCounter++;
                // Move the photo to the city's directory
                $photo->move($cityDirectory, $photoName);
            }
        }

        return redirect()->route('city.index')->with('success', 'City created successfully!');

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
        $city = city::where('id', $id)->first();

        return view('dashboard.city.Edit_city')->with('city', $city);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $tr = new TranslateMessages();
        $city = City::findOrFail($id); // Find the city by ID or fail if not found


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'population' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        // Handle validation failures
        if ($validator->fails()) {
            return response()->json([
                'success' => $tr->translate($validator->errors()->first()),
                'status' => 404
            ], 404);
        }
        // Update the city with new data
        $city->update([
            'name' => $request->name,
            'population' => $request->population,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        // Redirect or return a response
        return redirect()->route('city.index')->with('success', 'City updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy($id)
    {
        $city = City::where('id', $id)->first();
        $city->delete();
        return redirect()->route('city.index')->with('success', 'City deleted successfully');

    }
}
