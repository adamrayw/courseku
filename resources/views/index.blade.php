@extends('layouts.app')

@section('title', 'Tempat terbaik untuk mencari kursus & tutorial pemrograman')

@section('content')
<section class="max-w-7xl mx-auto px-4">
    <div class="flex justify-center text-center items-center mt-20 mb-28">
        <div class="px-4">
            <h1 class="animate__animated animate__fadeInUp font-bold mb-2 text-gray-600 text-4xl">Selamat datang di Kursusin!</h1>
            <p class="animate__animated animate__fadeInUp animate__delay-1s text-gray-400 text-lg">Tempat terbaik untuk mencari course pemrograman & design</p>
            <a href="#find-course" class="animate__animated animate__fadeInUp animate__delay-2s inline-block font-semibold mt-6 rounded-lg no-underline text-white bg-blue-500 hover:bg-blue-700 transition-all px-6 py-3">Explore Tutorial</a>
        </div>
    </div>
    <div class="flex justify-between items-center mt-10 px-4 md:px-0">
        <h1 class="text-2xl md:text-2xl font-semibold text-gray-600">Apa yang ingin kamu pelajari? </h1>
        <a href="/programming" class="md:visible invisible text-blue-500 hover:text-blue-700 transition">Lihat lebih banyak <i class="fas fa-chevron-right fa-lg ml-1"></i></a>
    </div>
    <div class="what-you-learn mb-20">
        <div class="grid grid-cols-1 md:grid-cols-5 md:px-0 px-4 gap-4 py-6">
            @foreach ($courses as $course)
            <a href="/learn/{{ $course->slug }}">
                <div class="card flex bg-white items-center shadow-sm border border-gray-200 p-4 rounded-lg hover:shadow-lg transition">
                    <img src="{{  $course->img_url  }}" alt="logo_courses">
                    <p class="ml-2 text-gray-600">{{ $course->name }}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="flex justify-end items-end px-4">
            <a href="/programming" class="text-right md:invisible visible text-blue-500 hover:text-blue-700 transition">Lihat lebih banyak <i class="fas fa-chevron-right fa-lg ml-1"></i></a>
        </div>
    </div>
    <div class="mt-10 px-4 md:px-0" id="find-course">
        <h1 class="text-2xl md:text-2xl font-semibold text-gray-600">Cari sesuai bidang kamu</h1>
    </div>
    <div class="what-you-learn mb-20">
        <div class="grid grid-cols-1 md:grid-cols-4 md:px-0 px-4 gap-4 py-6">
            @foreach ($fields as $field)
            <a href="/{{ $field->slug }}">
                <div class="card flex items-center bg-white shadow-sm border border-gray-200 p-4 rounded-lg hover:shadow-lg transition">
                    <img src="{{  $field->img_url  }}" alt="logo_field">
                    <p class="ml-2 text-gray-600">{{ $field->name }}</p>
                </div>
            </a>
            @endforeach
            <!-- <a href="/field/design">
                <div class="card flex items-center shadow p-4 rounded-lg hover:bg-gray-100 transition">
                    <img src="https://img.icons8.com/ios/50/000000/design.png" alt="logo" />
                    <p class="ml-2 text-gray-600">Design</p>
                </div>
            </a>
            <a href="#">
                <div class="card relative flex items-center shadow p-4 rounded-lg hover:bg-gray-100 transition">
                    <img src="https://img.icons8.com/ios/50/000000/devops.png" alt="logo" />
                    <p class="ml-2 text-gray-600">DevOps</p>
                    <p class="absolute right-0 top-0 bg-gray-600 text-sm text-gray-100 rounded-bl-lg px-2 py-1">Coming Soon</p>
                </div>
            </a>
            <a href="#">
                <div class="card relative flex items-center shadow p-4 rounded-lg hover:bg-gray-100 transition">
                    <img src="https://img.icons8.com/ios/50/000000/big-data.png" alt="logo" />
                    <p class="ml-2 text-gray-600">Data Science</p>
                    <p class="absolute right-0 top-0 bg-gray-600 text-sm text-gray-100 rounded-bl-lg px-2 py-1">Coming Soon</p>
                </div>
            </a> -->
        </div>
    </div>
</section>
@endsection
