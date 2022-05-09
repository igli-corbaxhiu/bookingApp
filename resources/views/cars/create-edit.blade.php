@extends('layouts.app')
@section('content')
    <div class="w-full max-w-xs sm:px-6 lg:px-8">
        @if(isset($car))
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-sm" method="POST" action="{{ route('cars.update', $car) }}">
            @method('PUT')
        @else
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-sm" method="POST" action="{{ route('cars.store') }}">
        @endif
        @csrf
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="brand">Car's Brand:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text" id="brand" name="brand"
                       value="@if(isset($car->brand)){{$car->brand}}@endif">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="model">Car's Model:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text" id="model" name="model"
                       value="@if(isset($car->model)){{$car->model}}@endif">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="engine">Car's Engine:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text" id="engine" name="engine"
                       value="@if(isset($car->engine)){{$car->engine}}@endif">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="color">Car's Color:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text" id="color" name="color"
                       value="@if(isset($car->color)){{$car->color}}@endif">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="price">Car's Price:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="number" id="price" name="price"
                       value="@if(isset($car->price)){{$car->price}}@endif">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <button class="border-2 bg-slate-300 py-2 px-4 rounded mt-2" type="submit">Submit</button>
            </div>
        </form>
        </form>
    </div>
@endsection
