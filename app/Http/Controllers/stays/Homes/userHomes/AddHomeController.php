<?php

namespace App\Http\Controllers\stays\Homes\userHomes;

use App\Http\Controllers\Controller;
use App\Models\homes\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // إضافة للرسائل التصحيحية

class AddHomeController extends Controller
{
    public function store(Request $request)
    {   
        $user = $request->user();
        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated');
        }

        $validatedData = $request->validate([
            'space' => 'required|numeric',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'monthly_rent' => 'required|numeric',
            'person_num' => 'required|integer',
            'rooms' => 'required|integer',
            'baths' => 'required|integer',
            'city_id' => 'required|exists:cities,id',
        ]);

        Log::info('Validated Data: ', $validatedData);

        try {
            $home = Home::create([
                'space' => $validatedData['space'],
                'location' => $validatedData['location'],
                'description' => $validatedData['description'],
                'monthly_rent' => $validatedData['monthly_rent'],
                'person_num' => $validatedData['person_num'],
                'rooms' => $validatedData['rooms'],
                'baths' => $validatedData['baths'],
                'user_owner_id' => $user->id,
                'city_id' => $validatedData['city_id'],
            ]);

            return redirect()->route('user.homes.addHome')
                             ->with('success', 'Your home has been added successfully and sent to the admin for verification.');
        } catch (\Exception $e) {
            Log::error('Error creating home: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create home. Error: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('userHomes.add-home');
    }
}

// return response()->json([
//     'message' => ' Thanks ,Your home information has been sent to the admin, and your home will start to be displayed in the application after the admin verifies the accuracy of the information.',
//     'home' => $home,
// ], 201);
