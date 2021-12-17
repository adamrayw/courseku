@extends('layouts.app')

@section('title', 'Tempat terbaik untuk mencari kursus & tutorial pemrograman')

@section('content')
    <section>
        <div
            class="max-w-7xl mx-auto flex md:flex-row flex-col text-center md:text-left justify-between items-center pt-20 md:pb-28 pb-6 ">
            <div class="px-4">
                <h1 class="font-bold mb-2 text-gray-600 text-4xl">Selamat datang di
                    Courseku!</h1>
                <p class="animate__delay-1s text-gray-500 text-lg">Tempat terbaik untuk
                    mencari course pemrograman & design</p>
                <a href="/explore"
                    class="animate__delay-2s inline-block font-semibold mt-6 rounded-lg no-underline text-white bg-blue-500 hover:bg-blue-700 transition-all px-6 py-3">Explore
                    Course</a>
                <div class="mt-10 md:invisilbe visible animate-bounce">
                    <a href="#find-course" class=" text-gray-500 mt-1"><i class="fas fa-arrow-down text-blue-500"></i></a>
                </div>
            </div>
            <div class="md:visible invisible">
                <img src="/img/hero.svg" alt="hero" width="260">
            </div>
        </div>

    </section>
    <section class="max-w-7xl mx-auto md:px-0 px-4">
        <div class="flex justify-between items-center mt-20 px-4 md:px-0" id="find-course">
            <h1 class="text-2xl md:text-2xl font-semibold text-gray-600">Apa yang ingin kamu pelajari? </h1>
            <a href="/programming" class="md:visible invisible text-blue-500 hover:text-blue-700 transition">Lihat lebih
                banyak <i class="fas fa-chevron-right fa-lg ml-1"></i></a>
        </div>
        <div class="what-you-learn mb-20">
            <div class="grid grid-cols-1 md:grid-cols-5 md:px-0 px-4 gap-4 py-6">
                @foreach ($courses as $course)
                    <a href="/learn/{{ $course->slug }}">
                        <div
                            class="card flex bg-white items-center shadow-sm border border-gray-200 p-4 rounded-lg hover:shadow-lg transition">
                            <img src="{{ $course->img_url }}" alt="logo_courses">
                            <p class="ml-2 text-gray-600">{{ $course->name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="flex justify-end items-end px-4">
                <a href="/programming"
                    class="text-right md:invisible visible text-blue-500 hover:text-blue-700 transition">Lihat lebih banyak
                    <i class="fas fa-chevron-right fa-lg ml-1"></i></a>
            </div>
        </div>
        <div class="mt-10 px-4 md:px-0">
            <h1 class="text-2xl md:text-2xl font-semibold text-gray-600">Cari sesuai bidang kamu</h1>
        </div>
        <div class="what-you-learn mb-20">
            <div class="grid grid-cols-1 md:grid-cols-4 md:px-0 px-4 gap-4 py-6">
                @foreach ($fields as $field)
                    <a href="/{{ $field->slug }}">
                        <div
                            class="card flex items-center bg-white shadow-sm border border-gray-200 p-4 rounded-lg hover:shadow-lg transition">
                            <img src="{{ $field->img_url }}" alt="logo_field">
                            <p class="ml-2 text-gray-600">{{ $field->name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <div class="app-banner bg-blue-500" id="banner">
        <div
            class="desc-banner flex flex-col md:flex-row justify-around items-center max-w-7xl mx-auto left-0 top-0 py-8 px-5 text-white">
            <div class="mr-4 text-center md:text-left mb-10 md:mb-0">
                <h1 class="text-2xl md:text-5xl font-bold" data-aos="fade-up" data-aos-duration="1000">Belajar di mana aja
                    <br>dalam genggaman.
                </h1>
                <p class="text-xs mt-4 md:text-xl font-medium" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="300">Sekarang Courseku punya aplikasi nya.</p>
                <a href="https://dl.dropbox.com/s/a8w6nwbrpt00701/app.apk?dl=0"
                    class="inline-block text-center mt-4 text-sm bg-white py-2 px-6 rounded-md text-blue-500 hover:bg-blue-700 transition"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <i class="fab fa-android fa-lg"></i>
                    <p>Android</p>
                </a>
                {{-- <a
                    class="inline-block text-center mt-4 text-sm bg-white py-2 px-6 rounded-md text-blue-500 transition" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <i class="fab fa-apple fa-lg"></i>
                    <p>IOS</p>
                </a> --}}
                <p class="text-gray-400 mt-2 text-xs" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    Version 2.0.0</p>
            </div>
            <div class="mockup" data-aos="flip-left" data-aos-duration="1600">
                <img src="/img/mockup.png" alt="mockup" class="h-auto w-64">
            </div>
        </div>
    </div>
@endsection
