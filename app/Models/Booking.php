<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable = [
        'start_date',
        'end_date',
        'car_id',
        'user_id'
    ];

    public function car()
    {
        return $this->hasOne(Cars::class, 'car_id', 'id');
    }
}
