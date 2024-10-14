@extends('layouts.app')

@section('content')
    <div class="p-10 flex justify-center items-center min-h-screen space-x-10">
        @foreach ($holyplaces as $holyplace)
            <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Template Image -->
                <img class="w-full h-48 object-cover" src="{{ $holyplace->image }}" alt="Template Image">

                <!-- Card Content -->
                <div class="p-6">
                    <!-- Name -->
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $holyplace->name }}</h2>
                    <!-- Description -->
                    <p class="text-gray-600 mb-4">
                        {{ $holyplace->discription }}
                    </p>

                    <!-- Action Button -->
                    <a href="{{ route('place', ['id' => $holyplace->id]) }}"
                        class="inline-block bg-indigo-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-indigo-700">
                        View More
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{-- <section class="bg-white shadow-md rounded-lg max-w-4xl mx-auto my-8 p-6">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Image or Icon of the Holy Place -->
            <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                <img class="w-32 h-32 rounded-full object-cover" src="https://via.placeholder.com/150" alt="Holy Place">
            </div>
            <!-- Place Information -->
            <div class="text-center md:text-left">
                <h1 class="text-3xl font-bold text-gray-800">Holy Place Name</h1>
                <p class="text-gray-600 mt-2">A brief description of the holy place, detailing its historical and spiritual
                    significance. It can be an ancient site or a modern place of worship known for pilgrimages.</p>
                <div class="mt-4">
                    <span class="inline-block bg-indigo-200 text-indigo-800 text-xs px-3 py-1 rounded-full">Spiritual</span>
                    <span class="inline-block bg-green-200 text-green-800 text-xs px-3 py-1 rounded-full">Historic</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="max-w-4xl mx-auto mb-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Location Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Latitude and Longitude -->
                <div>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Latitude:</span> 12.9716° N</p>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Longitude:</span> 77.5946° E</p>
                </div>
                <!-- Map -->
                <div class="w-full h-64">
                    <iframe class="w-full h-full rounded-lg"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.8354342951447!2d-122.4194151846816!3d37.77492977975906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808c00000001%3A0x49b5ff5c1f333933!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1633405367304!5m2!1sen!2sus"
                        allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Description Section -->
    <section class="max-w-4xl mx-auto mb-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detailed Description</h2>
            <p class="text-gray-600 leading-relaxed">
                This is where you can write an extended description of the holy place, diving deeper into its significance,
                history, and importance in local culture. You can mention any notable events that happened here, rituals
                performed, and the community that visits or takes care of this place. This section allows for a more
                thorough explanation of why this location is revered by many.
            </p>
        </div>
    </section> --}}
@endsection
