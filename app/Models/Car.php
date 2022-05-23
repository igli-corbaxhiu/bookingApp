<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = "cars";

    protected $fillable = ['brand', 'model', 'engine', 'status', 'color', 'price', 'timeBooked'];

    public function users() {

        return $this->belongsToMany(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

}
