<?php

namespace App\Http\Controllers;

use App\Http\Resources\Booking\BookingResource;
use App\Http\Resources\Booking\BookingResources;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Exception;

class BookingController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $model = Booking::where('car_id', $request->input('car_id'))
        ->get();
        return response()->json(
            new BookingResources($model)
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'price' => 'required',
            'car_id' => 'required'
        ]);
        $request->merge([
           'start_date' => Carbon::now(),
           'end_date' => Carbon::now()->addDays(7)
        ]);
        try {
            Booking::create($request->all());
            return response()->json([
                'message' => 'Автомобиль забронирован.'
            ]);
        } catch (\Exception $exception) {
            return responce()->json([
               'message' => $exception->getMessage()
            ]);
        }
        Booking::create($request->all());
        return response()->json([
            'message' => 'Автомобиль забронирован.'
        ]);
    }

}
