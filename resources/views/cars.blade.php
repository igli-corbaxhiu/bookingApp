@extends('layouts.app')
@section('content')
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
        @foreach ($sorted as $car)
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
            <div class="flex justify-center p-4 bg-white border-b border-gray-200">
                <a href="{{route('dashboard')}}">Go Back!</a>
            </div>
        </div>
    </div>
@endsection
