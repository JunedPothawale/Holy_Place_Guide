@extends('layouts.app')

@section('content')
    <!-- Include Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-4 sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-3xl font-extrabold text-indigo-700">Holy Guide</h1>
            <ul class="flex space-x-6 text-lg font-medium">
                <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600 transition duration-300">Home</a>
                </li>
                <li><a href="{{ route('place') }}" class="text-gray-700 hover:text-indigo-600 transition duration-300">Holy
                        Places</a></li>
                <li><a href="" class="text-gray-700 hover:text-indigo-600 transition duration-300">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[50vh] flex items-center justify-center"
        style="background-image: url('{{ asset('images/holy-place-hero.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 text-center">
            <h2 class="text-5xl text-white font-extrabold leading-tight drop-shadow-md">Discover Sacred Journeys</h2>
            <p class="text-xl text-gray-300 mt-4">Find, explore, and visit the most iconic holy places India.</p>
            <a href="#search"
                class="mt-8 inline-block bg-indigo-600 text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-indigo-700 transition duration-300">Start
                Exploring</a>
        </div>
    </section>
    <!-- Search Bar -->
    <div id="search" class="container mx-auto mt-12 px-4">
        <div class="flex justify-center">
            <input type="text" placeholder="Search holy places..."
                class="w-full max-w-lg p-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 transition duration-300 placeholder-gray-400">
        </div>
    </div>

    <!-- Featured Holy Places Section -->
    <section class="container mx-auto mt-16 px-4">
        <h3 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Featured Holy Places</h3>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($places as $place)
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
                            <img src="{{ asset($place->image) }}" alt="{{ $place->name }}"
                                class="w-full h-56 object-cover">
                            <div class="p-6">
                                <h4 class="text-2xl font-semibold text-indigo-700">{{ $place->name }}</h4>
                                <p class="text-sm text-gray-600 mt-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.5 3a1.5 1.5 0 00-1.5 1.5V15a1.5 1.5 0 001.5 1.5H14.5A1.5 1.5 0 0016 15V4.5A1.5 1.5 0 0014.5 3H5.5zM5 4.5A.5.5 0 015.5 4h9a.5.5 0 01.5.5V15a.5.5 0 01-.5.5h-9a.5.5 0 01-.5-.5V4.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $place->location }}
                                </p>
                                <p class="text-sm text-gray-600 mt-1 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 4a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM3 12a7 7 0 0114 0v1a2 2 0 01-2 2h-1v-1a4 4 0 00-8 0v1H5a2 2 0 01-2-2v-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $place->timings }}
                                </p>
                                <p class="mt-4 text-gray-700 leading-relaxed">{{ Str::limit($place->history, 100) }}</p>
                                <a href="" {{-- {{ route('', $place->id) }} --}}
                                    class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-indigo-700 transition duration-300">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-indigo-900 py-12 mt-16">
        <div class="container mx-auto text-center text-white px-4">
            <p class="text-lg">&copy; {{ date('Y') }} Holy Guide. All rights reserved.</p>
            <div class="mt-6 space-x-6">
                <a href="#" class="hover:text-blue-400"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="hover:text-blue-400"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="hover:text-blue-400"><i class="fab fa-instagram fa-lg"></i></a>
            </div>
        </div>
    </footer>

    <!-- Include Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swiper for hero and featured sections
        const swiperHero = new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 1,
            spaceBetween: 10,
        });

        const swiperFeatured = new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
