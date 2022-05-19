<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $cars = Car::all();
        $userId = Auth::user()->id;
        $bookings = Booking::all()->where('user_id', '=', $userId);
        $timeBooked = array();
        $bookingCars = array();

        foreach ($bookings as $booking){

            $bookingCars[] = $booking['car_id'];
        }
        $favouriteCar = Car::find($bookingCars);

        foreach ($favouriteCar as $car){

            $timeBooked[] = $car['timeBooked'];
        }
        if(!empty($timeBooked)) {
            $max = max($timeBooked);
            $fav = $favouriteCar->where('timeBooked', $max);
            return view('dashboard', compact('cars', 'bookings', 'fav'));
        }
        else {
            return view('dashboard', compact('cars', 'bookings'));
        }
    }
}
