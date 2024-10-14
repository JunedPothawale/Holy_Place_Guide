@extends('layouts.app')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="xl:w-[700px] px-10 h-[400px] rounded-3xl xl:shadow-xl">
            <h1 class="text-center text-3xl font-bold mt-2 mb-2">Login</h1>
            <hr>
            <div class="flex justify-center mt-10">
                <form action="{{ route('dologin') }}" method="POST">
                    @csrf
                    <input type="text" name="email" id=""
                        class="py-3 p-5 rounded-md  bg-zinc-50 md:w-[500px] w-[300px] outline-indigo-400"
                        placeholder="Enter your email">
                    @error('email')
                        <p class="text-red-500 font-semibold text-sm">{{ $message }}</p>
                    @enderror
                    <br><br>
                    <input type="text" name="password" id=""
                        class="py-3 p-5 rounded-md  bg-zinc-50 md:w-[500px] w-[300px] outline-indigo-400"
                        placeholder="Enter your password">

                    @error('password')
                        <p class="text-red-500 font-semibold text-sm ">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-end mt-3 mb-4">
                        <a href="#" class="text-blue-700"></a>
                    </div>

                    <button type="submit" class="py-3 bg-indigo-400 text-white w-full rounded-md font-bold">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
