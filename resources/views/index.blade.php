@extends('layouts.app')

@section('content')
    <div class="h-screen w-full flex justify-center items-center bg-slate-100">
        <form action="{{ route('get-location') }}" method="get" class=" flex justify-center items-center w-[50vw]">
            <input class="rounded-full p-5 border-none outline-none text-xl font-medium w-[90%] capitalize" type="search"
                name="search_location" id="SearchLocation" placeholder="search for the location you want...">
            <input class="btn bg-gray-100 hidden" type="submit" value="submit">
        </form>
        <div class="suggention flex flex-col space-y-10 overflow-y-scroll h-[50vh]">
            <h4 class="text-center  font-mono font-semibold text-2xl">
                Suggestions
            </h4>
            @foreach ($places as $holylocation)
                <div class="bg-white p-6 rounded-lg shadow-lg ">
                    <h2 class="text-xl font-bold mb-2">{{ $holylocation->location }}</h2>
                    <p class="text-gray-700">{{ $holylocation->name }}</p>
                </div>
            @endforeach

        </div>
    </div>
@endsection
