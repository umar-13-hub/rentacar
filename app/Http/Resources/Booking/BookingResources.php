<?php

namespace App\Http\Resources\Booking;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResources extends JsonResource
{
    public function toArray(Request $request)
    {
        return BookingResource::collection($this->resource);
    }
}
