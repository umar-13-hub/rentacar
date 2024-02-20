<?php

namespace App\Http\Resources\Booking;

use App\Http\Resources\Car\CarResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request)
    {
        return [
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'car_id' => $this->car_id,
            'user_id' => $this->user_id,
            'car' => new CarResource($this->car)
        ];
    }
}
