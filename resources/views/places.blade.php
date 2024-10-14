@extends('layouts.app')

@section('content')
    <style>
        /* Smooth scaling on hover */
        .gallery-item:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Modal background */
        #modal-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
        }

        /* Modal content */
        #modal-content img {
            max-width: 90%;
            max-height: 90%;
        }
    </style>


    <!-- Profile Section -->
    <section class="max-w-5xl mx-auto my-10 bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="flex flex-col md:flex-row items-center p-8 bg-indigo-600 text-white">
            <!-- Profile Image -->
            <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                <img class="w-32 h-32 rounded-full object-cover shadow-md" src="{{ $place[0]->image }}" alt="Profile Image">
            </div>
            <!-- Name and Description -->
            <div class="text-center md:text-left">
                <h1 class="text-4xl font-bold">{{ $place[0]->name }}</h1>
                <p class="mt-2 text-lg leading-relaxed">
                    {{ $place[0]->discription }}
                </p>
            </div>
        </div>

        <!-- Map Section -->
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Location Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Coordinates -->
                <div class="space-y-2">
                    <p class="text-lg text-gray-700"><span class="font-semibold">Latitude:</span> {{ $place[0]->latitude }}
                    </p>
                    <p class="text-lg text-gray-700"><span class="font-semibold">Longitude:</span>
                        {{ $place[0]->longitude }}</p>
                </div>
                <!-- Embedded Map -->
                <div class="w-full h-64">
                    <iframe class="w-full h-full rounded-lg shadow-md"
                        src = "https://maps.google.com/maps?q={{ $place[0]->latitude }},{{ $place[0]->longitude }}&hl=es;z=14&amp;output=embed"
                        allowfullscreen="" loading="lazy">
                    </iframe>
                    <iframe></iframe>

                </div>
            </div>
        </div>

        <!-- Image Gallery Section -->
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Image Gallery</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Gallery Images -->
                <img class="gallery-item w-full h-48 object-cover rounded-lg shadow-md cursor-pointer"
                    src="{{ $place[0]->image }}" alt="Image 1" onclick="openModal(this.src)">
            </div>
        </div>
    </section>

    <!-- Modal for Enlarged Image -->
    <div id="modal-bg" class="fixed inset-0 flex items-center justify-center">
        <div id="modal-content" class="bg-white p-4 rounded-lg shadow-lg">
            <span class="absolute top-4 right-4 text-white text-2xl cursor-pointer" onclick="closeModal()">&times;</span>
            <img src="" alt="Enlarged Image" id="modal-image">
        </div>
    </div>

    <!-- JavaScript for Modal -->
    <script>
        function openModal(src) {
            document.getElementById('modal-bg').style.display = 'flex';
            document.getElementById('modal-image').src = src;
        }

        function closeModal() {
            document.getElementById('modal-bg').style.display = 'none';
        }
    </script>

    <script>
        function initialize() {
            var myLatlng = new google.maps.LatLng({{ $place[0]->latitude }}, {{ $place[0]->longitude }});
            var myOptions = {
                zoom: 8,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        }

        function loadScript() {
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
            document.body.appendChild(script);
        }

        window.onload = loadScript;
    </script>
@endsection
