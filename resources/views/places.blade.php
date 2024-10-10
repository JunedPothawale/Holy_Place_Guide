@extends('layouts.app')

@section('content')
    <!-- Hero Section -->

    <section class="relative bg-cover bg-center h-[60vh] flex items-center justify-center"
        style="background-image: url('{{ asset($place[0]->image) }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 text-center">
            <h2 class="text-4xl text-white font-extrabold leading-tight drop-shadow-md">{{ $place[0]->name }}</h2>
            <p class="text-lg text-gray-300 mt-2">{{ $place[0]->location }}</p>
        </div>
    </section>

    <!-- Details Section -->
    <div class="container mx-auto mt-12 px-4">
        <h3 class="text-3xl font-semibold text-gray-800 mb-6">About {{ $place[0]->name }}</h3>
        <p class="text-gray-700 leading-relaxed">{{ $place[0]->history }}</p>
        <div class="mt-8">
            <h4 class="text-2xl font-semibold text-indigo-700">Visiting Hours:</h4>
            <p class="text-gray-600">{{ $place[0]->timings }}</p>
        </div>
        <div class="mt-4">
            <h4 class="text-2xl font-semibold text-indigo-700">Location:</h4>
            <p class="text-gray-600">{{ $place[0]->location }}</p>
        </div>
        <div class="mt-4">
            <h4 class="text-2xl font-semibold text-indigo-700">More Images:</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                {{-- @foreach ($place->images as $image) --}}
                <img src="{{ asset($place[0]->name) }}" alt="{{ $place[0]->name }}"
                    class="w-full h-48 object-cover rounded-lg">
                {{-- @endforeach --}}
            </div>
        </div>
        <a href="{{ route('place') }}"
            class="mt-8 inline-block bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-indigo-700 transition duration-300">Back
            to Holy Places</a>
    </div>

    <!-- Footer -->
    <footer class="bg-indigo-900 py-12 mt-16">
        <div class="container mx-auto text-center text-white">
            <p class="text-lg">&copy; {{ date('Y') }} Guide For Holy Places. All rights reserved.</p>
            <div class="mt-6 space-x-6">
                <a href="#" class="hover:text-blue-400"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="hover:text-blue-400"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="hover:text-blue-400"><i class="fab fa-instagram fa-lg"></i></a>
            </div>
        </div>
    </footer>
@endsection
