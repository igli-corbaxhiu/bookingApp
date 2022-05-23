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
                <div class="flex md:flex-row flex-col justify-center max-w-6xl mx-auto sm:px-4 lg:px-6">
                    <div class="flex justify-center">
{{--                        <table class="border-collapse border-2 border-slate-300 text-lg mt-4">--}}
{{--                            <thead>--}}
{{--                                <tr>--}}
{{--                                    <th class="border border-slate-300 text-center px-4">Id</th>--}}
{{--                                    <th class="border border-slate-300 text-center px-4">Car Brand</th>--}}
{{--                                    <th class="border border-slate-300 text-center px-4">Car Model</th>--}}
{{--                                    <th class="border border-slate-300 text-center px-4">Car Engine</th>--}}
{{--                                    <th class="border border-slate-300 text-center px-4">Car Color</th>--}}
{{--                                    <th class="border border-slate-300 text-center px-4">Car Price</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
                        <div class="flex flex-col sm:flex-wrap sm:flex-row mt-4 mx-4">
                            @foreach ($cars as $car)
                            <div class="flex flex-col sm:flex-wrap p-4 sm:pt-0 max-w-xl">
                                <div class="flex">
                                    <img src="{{ url('/images/volkswagen_golf_gte_2021_5k-HD.png') }}" class="w-full sm:w-28" alt="volkswagen">
                                </div>
                                <div class="py-1 flex">
                                    <div class="text-sm flex flex-row sm:flex-col">
                                        <div class="flex flex-row space-x-2">
                                            <div class="flex">{{ $car->brand }}</div>
                                            <div class="flex">{{ $car->model }}</div>
                                        </div>
                                        <div class="flex">
                                            <div class="flex">{{ $car->price }}$</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
{{--                            </tbody>--}}
{{--                        </table>--}}
                    </div>
                    <div class="flex flex-col">
                        <div class="mx-auto justify-center flex lg:px-8 mt-4">
                            <div class="bg-white overflow-hidden shadow-sm rounded w-48">
                                <div class="flex justify-center p-4 bg-blue-200 border-b border-gray-200">
                                    <a href="{{route('bookings.create')}}">Book a car</a>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto justify-center flex flex-col lg:px-8 mt-4 space-x-8">
                            <h1 class="mb-2 text-center flex">Sort cars in ascending or descending order!</h1>
                            <form action="{{ route('cars.sort')}}" method="post">
                                @csrf
                                <select name="sorting">
                                    <option value="ascending">Ascending</option>
                                    <option value="descending">Descending</option>
                                </select>
                                <button value="submit" type="submit" class="border border-gray-200 bg-blue-200 px-4 py-2 mt-2 rounded">Submit</button>
                            </form>
                        </div>
                    </div>
                    </div>
                    @if(!empty($notAllowed))
                        <div class="flex justify-center mt-4"> {{ $notAllowed }}</div>
                    @else
                    <div class="flex flex-col md:flex-row space-x-6 mt-4 mx-auto sm:px-4 lg:px-6">
                        <div class="flex flex-col">
                            <h1 class="flex justify-center">Booked Cars</h1>
                            <div class="flex justify-center mt-2">
                                <table class="border-collapse border-2 border-slate-300 text-lg mt-2 mb-4">
                                    <thead>
                                    <tr>
                                        <th class="border text-center border-slate-300 px-4">Id</th>
                                        <th class="border text-center border-slate-300 px-4">Car Id</th>
                                        <th class="border text-center border-slate-300 px-4">Start Day</th>
                                        <th class="border text-center border-slate-300 px-4">Return Day</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($bookings as $booking)
                                            <tr>
                                                <td class="border text-center border-slate-300">{{$booking->id}}</td>
                                                <td class="border text-center border-slate-300">{{$booking->car_id}}</td>
                                                <td class="border text-center border-slate-300">{{$booking->start_time }}</td>
                                                <td class="border text-center border-slate-300">{{$booking->return_time }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <h1 class="flex justify-center">Your favourite car!</h1>
                                <div class="flex justify-center mt-2">
                                    <table class="border-collapse border-2 border-slate-300 text-lg mt-2 mb-4">
                                        <thead>
                                        <tr>
                                            <th class="border text-center border-slate-300 px-4">Id</th>
                                            <th class="border text-center border-slate-300 px-4">Car Brand</th>
                                            <th class="border text-center border-slate-300 px-4">Car Model</th>
                                            <th class="border text-center border-slate-300 px-4">Car Engine</th>
                                            <th class="border text-center border-slate-300 px-4">Car Color</th>
                                            <th class="border text-center border-slate-300 px-4">Car Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($fav as $car)
                                            <tr>
                                                <td class="border text-center border-slate-300">{{$car->id}}</td>
                                                <td class="border text-center border-slate-300">{{$car->brand }}</td>
                                                <td class="border text-center border-slate-300">{{$car->model }}</td>
                                                <td class="border text-center border-slate-300">{{$car->engine }}</td>
                                                <td class="border text-center border-slate-300">{{$car->color }}</td>
                                                <td class="border text-center border-slate-300">{{$car->price }}$</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endrole
            </div>
        </div>
    </div>
@endsection
