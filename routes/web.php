<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CarsController;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

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
    $max = max($timeBooked);

    $fav = $favouriteCar->where('timeBooked', $max);

    return view('dashboard', compact('cars', 'bookings', 'fav'));
})->middleware(['auth'])->name('dashboard');

Route::resource('cars', CarsController::class)->middleware('role:admin');
Route::resource('bookings', BookingsController::class)->middleware('role:user');
Route::any('sortDesc', [CarsController::class, 'sortDesc'])->name('cars.sortDesc')->middleware('role:user');
Route::any('sort', [CarsController::class, 'sort'])->name('cars.sort')->middleware('role:user');


require __DIR__.'/auth.php';
