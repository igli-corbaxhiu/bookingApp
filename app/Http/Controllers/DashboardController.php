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
        $bookingsArray = $bookings->toArray();
        $ids = array();

        foreach ($bookingsArray as $booking){

            $ids[] = $booking['car_id'];
        }
        $arr_freq = array_count_values($ids);
        arsort($arr_freq);
        $ids = array_keys($arr_freq);

        if(!empty($ids)) {
            $carId = $ids[0];
            $fav = Car::all()->where('id', $carId);
        }
        else {
            $fav = array();
        }
        return view('dashboard', compact('cars', 'bookings', 'fav'));

    }
}
