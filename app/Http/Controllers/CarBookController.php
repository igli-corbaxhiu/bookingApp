<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $cars = Car::all();
        $birth = Auth::user()->birthDate;
        $currentDate = Carbon::now();
        $before18Years = $currentDate->diff($birth);
        if($before18Years->y >= 18){
            return view('bookings.create', compact('cars'));
        }
        else {
            return view('dashboard', compact('cars'))
                ->with('notAllowed', 'You should be 18 or older to book a car!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
           'start_time' => [
               'after:today'
           ],
            'return_time' => [
                'after_or_equal:start_time'
            ]
        ]);

        $carbooking = new CarBooking();
        $carbooking->fill($request->all());
        $carbooking->booked_user_id = Auth::user()->id;
        $carbooking->car->status = 0;

        $carbooking->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CarBooking $carBooking)
    {
        //
    }
}
