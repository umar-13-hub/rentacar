<?php

namespace App\Http\Resources\Car;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResources extends JsonResource
{
    public function toArray(Request $request)
    {
        return CarResource::collection($this->resource);
    }
}
