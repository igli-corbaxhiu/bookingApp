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

    return view('dashboard', compact('cars', 'bookings'));
})->middleware(['auth'])->name('dashboard');

Route::resource('cars', CarsController::class)->middleware('role:admin');
Route::resource('bookings', BookingsController::class)->middleware('role:user');

require __DIR__.'/auth.php';
