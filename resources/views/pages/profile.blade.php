@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<section class="mt-20 w-full mx-4 md:w-5/12 md:mx-auto">
    <div class="flex justify-between items-start">
        <div class="flex items-start">
            <div class="bg-gray-500 w-24 h-24 p-4 flex justify-center items-center mr-4 rounded-md">
                <h1 class="font-bold mb-1 text-white text-4xl">{{ Auth()->user()->name[0] }}</h1>
            </div>
            <div>
                <h3 class="text-gray-600 text-2xl font-semibold">{{ Auth()->user()->name }}</h3>
                <p class="text-gray-500">Member Since : {{ Auth()->user()->created_at->toFormattedDateString() }}</p>
            </div>
        </div>
        <div class="">
            <div>
                <div class="flex items-center">
                    <img src="img/point.png" alt="point" width="18">
                    <p class="ml-1 font-medium text-gray-600">Points</p>
                </div>
                <div class="mt-1">
                    <p class="text-gray-500">2000</p>
                </div>
                <!-- <a href="#!" class="mt-2 inline-block text-center border-2 text-gray-500 text-sm border-gray-500 rounded-md px-6 py-2">Follow</a> -->
            </div>
            <!-- <p class="text-gray-500 text-md font-semibold">{{-- '@'.Auth()->user()->username --}}</p> -->
        </div>
    </div>
    <div class="menu mt-6 text-center flex border shadow-sm bg-gray-100 overflow-auto">
        <a href="#" class="w-full p-4 text-gray-600 ">Liked Tutorials</a>
        <a href="#" class="w-full p-4 text-gray-600 ">Submitted</a>
        <a href="#" class="w-full p-4 text-gray-600  ">Saved Tutorials</a>
    </div>
    <div class="bg-white p-4">
        <div class="card">
            <h4 class="text-gray-600">Javascript Dasar</h4>
        </div>
    </div>
</section>
@endsection
