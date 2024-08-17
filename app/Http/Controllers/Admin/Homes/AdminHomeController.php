<?php

namespace App\Http\Controllers\Admin\Homes;

use App\Http\Controllers\Controller;
use App\Models\homes\Home;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        // جلب جميع البيوت مع تقسيمها حسب حالة التحقق
        $verifiedHomes = Home::where('Verification_status', 'Verified')->with('photos')->get();
        $unverifiedHomes = Home::where('Verification_status', 'Unverified')->with('photos')->get();

        return view('dashboard.homes.index', compact('verifiedHomes', 'unverifiedHomes'));
    }

    public function show($id)
    {
        // جلب معلومات البيت بناءً على المعرف
        $home = Home::with('Owner')->findOrFail($id);
        return view('dashboard.homes.show', compact('home'));
    }

    public function destroy($id)
    {
        // حذف البيت بناءً على المعرف
        $home = Home::findOrFail($id);
        $home->delete();

        return redirect()->route('admin.homes.index')->with('success', 'Home deleted successfully.');
    }

    public function verify(Request $request, $id)
    {
        // تحديث حالة التحقق للبيت بناءً على المعرف
        $home = Home::findOrFail($id);
        $home->Verification_status = $request->input('Verification_status');
        $home->save();

        return redirect()->route('admin.homes.show', $id)->with('success', 'Home verification status updated successfully.');
    }
}
