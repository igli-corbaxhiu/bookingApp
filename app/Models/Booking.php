<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";

    protected $fillable = [
        'start_time',
        'return_time',
        'car_id',
        'user_id'
    ];

    public function users() {

        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }
}
