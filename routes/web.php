<?php

use App\Http\Controllers\CarBookController;
use App\Http\Controllers\CarsController;
use App\Models\Car;
use App\Models\CarBooking;
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
    $carBookings = CarBooking::all()->where('booked_user_id', '=', $userId);
    return view('dashboard', compact('cars', 'carBookings'));
})->middleware(['auth'])->name('dashboard');

Route::resource('cars', CarsController::class)->middleware('role:admin');
Route::resource('bookings', CarBookController::class)->middleware('role:user');

require __DIR__.'/auth.php';
