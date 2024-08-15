<?php

namespace App\Http\Controllers\stays\Homes\userHomes;

use App\Http\Controllers\Controller;
use App\Models\homes\Home;
use Illuminate\Http\Request;

class AddHomeController extends Controller
{
    public function store(Request $request)
    {
        // الحصول على المستخدم الموثق (الذي أرسل الطلب)
        $user = $request->user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        // التحقق من صحة البيانات الواردة في الطلب
        $validatedData = $request->validate([
            'space' => 'required|numeric',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'monthly_rent' => 'required|numeric',
            'person_num' => 'required|integer',
            'rooms' => 'required|integer',
            'baths' => 'required|integer',
            'city_id' => 'required|exists:cities,id',
            // 'images' => 'nullable|array',
            // 'images.*' => 'url'
        ]);

        // إنشاء منزل جديد باستخدام البيانات المتحقق منها
        $home = Home::create([
            'space' => $validatedData['space'],
            'location' => $validatedData['location'],
            'description' => $validatedData['description'],
            'monthly_rent' => $validatedData['monthly_rent'],
            'person_num' => $validatedData['person_num'],
            'rooms' => $validatedData['rooms'],
            'baths' => $validatedData['baths'],
            'user_owner_id' => $user->id, // استخدام معرف المستخدم الموثق
            'city_id' => $validatedData['city_id'],
        ]);

        // إذا كانت هناك صور مرفقة، قم بتخزينها
        // if (isset($validatedData['images'])) {
        //     foreach ($validatedData['images'] as $image) {
        //         $home->images()->create(['url' => $image]);
        //     }
        // }

        // ارجاع استجابة نجاح مع البيانات التي تم تخزينها
        return response()->json([
            'message' => ' Thanks ,Your home information has been sent to the admin, and your home will start to be displayed in the application after the admin verifies the accuracy of the information.',
            'home' => $home,
        ], 201);
    }
}
