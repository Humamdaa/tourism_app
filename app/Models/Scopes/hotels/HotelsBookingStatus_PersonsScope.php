<?php

namespace App\Models\Scopes\hotels;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Http\Request;

class HotelsBookingStatus_PersonsScope implements Scope
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function scopePersonNum(Builder $query, $personNum)
    {
        return $query->whereHas('rooms', function ($roomQuery) use ($personNum) {
            $roomQuery->where(function ($query) use ($personNum) {
                $query->where('isBooking', 0)->where('person_num', '>=', $personNum);
            })->orWhere(function ($query) use ($personNum) {
                $query->where('isBooking', 1)->where('person_num', '>=', $personNum);
            });
        }, '>=', $query->getModel()->rooms()->count())
            ->with(['rooms' => function ($query) use ($personNum) {
                $query->where('person_num', '>=', $personNum);
            }, 'rooms.bookings']);
    }

    public function apply(Builder $builder, Model $model)
    {
        // TODO: Implement apply() method.
    }
}


//الحالة الأولى: التحقق من عدم تداخل تواريخ الحجوزات الحالية مع تواريخ الحجز المرسل.
//الحالة الثانية: التحقق من أن تاريخ بدء الحجز المرسل يأتي بعد انتهاء آخر حجز موجود في الغرفة.
//الحالة الثالثة: التحقق من أن تاريخ بدء أول حجز موجود في الغرفة يسبق انتهاء الحجز المرسل

//inside apply:
//$builder->where('isBooking', 0) // للتحقق من عدم وجود حجز
//    ->orWhere(function ($query) use ($start, $end) {
//        $query->where('isBooking', 1)
//            ->whereDoesntHave('rooms.bookings', function ($bookingQuery) use ($start, $end) {
//                $bookingQuery->where(function ($bookingSubQuery) use ($start, $end) {
//                    $bookingSubQuery->where('end', '<', $start); // حالة 1
//                })->orWhere(function ($bookingSubQuery) use ($start, $end) {
//                    $bookingSubQuery->where('start', '>', $end); // حالة 1
//                });
//            })->orWhere(function ($bookingQuery) use ($start, $end) {
//                $bookingQuery->where('start', '>', $end); // حالة 2
//            })->orWhere(function ($bookingQuery) use ($start, $end) {
//                $bookingQuery->where('end', '<', $start); // حالة 3
//            });
//    })
//    ->with(['rooms.bookings' => function ($query) use ($start, $end) {
//        $query->where('end', '>=', $start)
//            ->where('start', '<=', $end);
//    }]);
