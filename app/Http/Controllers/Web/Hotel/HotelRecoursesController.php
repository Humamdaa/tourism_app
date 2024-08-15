<?php

namespace App\Http\Controllers\Web\Hotel;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Services\translate\TranslateMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelRecoursesController extends Controller
{
    public function show_hotels_in_specific_city()
    {

    }

    public function search_city(Request $request)
    {
        return $request;
        $input = $request->input('input');
        return $input;

        return 'here';

        $validator = Validator::make(['input' => $input], [
            'input' => 'required|min:1', // Ensure that the input is not empty
        ]);
        $tr = new TranslateMessages();

        if ($validator->fails()) {
//            return 'error';
            return redirect()->back()->with('result', $tr->translate($validator));
        }
        return 'hi';

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
