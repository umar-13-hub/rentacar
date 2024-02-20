<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';
    protected $fillable = [
        'brand',
        'model',
        'year',
        'color',
        'price',
        'chars'
    ];

    protected $casts = [
        'chars' => 'array'
    ];

    public function booking()
    {
         return $this->hasMany(Booking::class, 'car_id', 'id');
    }
}
