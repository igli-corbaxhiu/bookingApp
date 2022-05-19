<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\DashboardController;
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

Route::any('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);

Route::resource('cars', CarsController::class)->middleware('role:admin');
Route::resource('bookings', BookingsController::class)->middleware('role:user');
Route::any('sortDesc', [CarsController::class, 'sortDesc'])->name('cars.sortDesc')->middleware('role:user');
Route::any('sort', [CarsController::class, 'sort'])->name('cars.sort')->middleware('role:user');


require __DIR__.'/auth.php';
