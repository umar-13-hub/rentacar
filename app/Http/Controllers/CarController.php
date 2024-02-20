<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestCar;
use App\Http\Resources\Car\CarResources;
use App\Models\Cars;

class CarController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $model = Cars::with('booking')->get();
        return response()->json(
            new CarResources($model)
        );
    }

    /**
     * @param StoreRequestCar $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequestCar $request)
    {
        Cars::create($request->all());
        return response()->json('Успех.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $model = Cars::find($id);
        return response()->json([

        ]);
    }
}
