<?php

namespace App\Services\homes\showHomes;

use App\Models\homes\BookHome;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RemoveBookedHomes
{
    public function fixBooking($homes, $start, $end)
    {
        foreach ($homes["homes"] as $homeKey => &$home) {
        //    return $home["home_bookings"];
            foreach ($home["home_bookings"] as $curBook) {

                if ($start >= $curBook['start'] && $start <= $curBook['end']) {

                    unset($homes["homes"][$homeKey]);
                } elseif ($end >= $curBook['start'] && $end <= $curBook['end']) {
                    unset($home);

                } elseif ($start <= $curBook['start'] && $end >= $curBook['end']) {
                    unset($home);

                }
            }

        }

        if (empty($homes)) {
            // If rooms array is empty, unset the hotel
            unset($homes);
        }
        return $homes;
    }
}

// $homes = collect($homes);
// foreach ($homes as $key => $home) {
//     if (isset($home["space"])) {
//         error_log("المفتاح 'space' غير موجود في العنصر بالمفتاح: " . $key);
//     } else {
//         // إذا كان المفتاح موجودًا، طباعة قيمته
//         error_log("قيمة 'space' للعنصر بالمفتاح {$key} هي: " . $home["space"]);
//     }
//     // التحقق من وجود مفتاح "home_bookings" قبل البدء في التكرار
//     if (isset($home["home_bookings"])) {
//         foreach ($home["home_bookings"] as $curBook) {
//             // التحقق من تداخل التواريخ
//             if ($start >= $curBook['start'] && $start <= $curBook['end']) {
//                 $homes->forget($key); // إزالة البيت من المجموعة
//                 break; // الخروج من الحلقة الداخلية
//             } elseif ($end >= $curBook['start'] && $end <= $curBook['end']) {
//                 $homes->forget($key);
//                 break;
//             } elseif ($start <= $curBook['start'] && $end >= $curBook['end']) {
//                 $homes->forget($key);
//                 break;
//             }
//         }
//     }
// }

// // إعادة تحويل المجموعة إلى مصفوفة
// return $homes->toArray();
