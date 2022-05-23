@extends('layouts.app')
@section('content')
<div class="mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @role('admin')
                <div class="flex flex-col justify-center max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-center">
                        <table class="border-collapse border-2 border-slate-300 text-xl mt-4">
                            <thead>
                            <tr>
                                <th class="border border-slate-300 px-4">Id</th>
                                <th class="border border-slate-300 px-4">Car Brand</th>
                                <th class="border border-slate-300 px-4">Car Model</th>
                                <th class="border border-slate-300 px-4">Car Engine</th>
                                <th class="border border-slate-300 px-4">Car Color</th>
                                <th class="border border-slate-300 px-4">Car Price</th>
                                <th class="border border-slate-300 px-4">Edit Car</th>
                                <th class="border border-slate-300 px-4">Delete Car</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td class="border border-slate-300">{{$car->id}}</td>
                                    <td class="border border-slate-300">{{$car->brand }}</td>
                                    <td class="border border-slate-300">{{$car->model }}</td>
                                    <td class="border border-slate-300">{{$car->engine }}</td>
                                    <td class="border border-slate-300">{{$car->color }}</td>
                                    <td class="border border-slate-300">{{$car->price }}</td>
                                    <td class="border border-slate-300"><a href="{{route('cars.edit', $car->id)}}">Edit</a></td>
                                    <td class="border border-slate-300">
                                        <form action="{{route('cars.destroy', $car->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mx-auto justify-center flex lg:px-8 mt-4">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-48">
                            <div class="flex justify-center p-4 bg-white border-b border-gray-200">
                                <a href="{{route('cars.create')}}">+ ADD Car</a>
                            </div>
                        </div>
                    </div>

                </div>
                @else
                    <div class="flex flex-col justify-center max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="flex justify-center">
                            <table class="border-collapse border-2 border-slate-300 text-xl mt-4">
                                <thead>
                                <tr>
                                    <th class="border border-slate-300 px-4">Id</th>
                                    <th class="border border-slate-300 px-4">Car Brand</th>
                                    <th class="border border-slate-300 px-4">Car Model</th>
                                    <th class="border border-slate-300 px-4">Car Engine</th>
                                    <th class="border border-slate-300 px-4">Car Color</th>
                                    <th class="border border-slate-300 px-4">Car Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cars as $car)
                                    <tr>
                                        <td class="border border-slate-300">{{$car->id}}</td>
                                        <td class="border border-slate-300">{{$car->brand }}</td>
                                        <td class="border border-slate-300">{{$car->model }}</td>
                                        <td class="border border-slate-300">{{$car->engine }}</td>
                                        <td class="border border-slate-300">{{$car->color }}</td>
                                        <td class="border border-slate-300">{{$car->price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mx-auto justify-center flex lg:px-8 mt-4">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-48">
                                <div class="flex justify-center p-4 bg-blue-200 border-b border-gray-200">
                                    <a href="{{route('bookings.create')}}">Book a car</a>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto justify-center flex flex-col lg:px-8 mt-4 space-x-8">

                            <h1 class="mb-2">Sort cars in ascending or descending order!</h1>
                            <form action="{{ route('cars.sort')}}" method="post">
                                @csrf
                                <select name="sorting">
                                    <option value="ascending">Ascending</option>
                                    <option value="descending">Descending</option>
                                </select>
                                <button value="submit" type="submit">Submit</button>
                            </form>
                        </div>

                        @if(!empty($notAllowed))
                            <div class="flex justify-center mt-4"> {{ $notAllowed }}</div>
                        @else
                            <h1 class="flex justify-center underline mt-8">Booked Cars</h1>
                            <div class="flex justify-center mt-2">
                                <table class="border-collapse border-2 border-slate-300 text-xl mt-2 mb-4">
                                    <thead>
                                    <tr>
                                        <th class="border border-slate-300 px-4">Id</th>
                                        <th class="border border-slate-300 px-4">Car Id</th>
                                        <th class="border border-slate-300 px-4">Start Day</th>
                                        <th class="border border-slate-300 px-4">Return Day</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td class="border border-slate-300">{{$booking->id}}</td>
                                            <td class="border border-slate-300">{{$booking->car_id}}</td>
                                            <td class="border border-slate-300">{{$booking->start_time }}</td>
                                            <td class="border border-slate-300">{{$booking->return_time }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-center mt-2 flex-col">
                                <h1>Your favourite car/s!</h1>
                                <table class="border-collapse border-2 border-slate-300 text-xl mt-4 mb-4">
                                    <thead>
                                    <tr>
                                        <th class="border border-slate-300 px-4">Id</th>
                                        <th class="border border-slate-300 px-4">Car Brand</th>
                                        <th class="border border-slate-300 px-4">Car Model</th>
                                        <th class="border border-slate-300 px-4">Car Engine</th>
                                        <th class="border border-slate-300 px-4">Car Color</th>
                                        <th class="border border-slate-300 px-4">Car Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($fav as $car)
                                        <tr>
                                            <td class="border border-slate-300">{{$car->id}}</td>
                                            <td class="border border-slate-300">{{$car->brand }}</td>
                                            <td class="border border-slate-300">{{$car->model }}</td>
                                            <td class="border border-slate-300">{{$car->engine }}</td>
                                            <td class="border border-slate-300">{{$car->color }}</td>
                                            <td class="border border-slate-300">{{$car->price }}$</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    @endrole
            </div>
        </div>
    </div>
@endsection
