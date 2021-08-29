@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<section class="mt-20 w-full mx-4 md:w-5/12 md:mx-auto">
    <div class="flex items-start">
        <div class="bg-gray-500 w-24 h-24 rounded-md p-4 flex justify-center items-center mr-4">
            <h1 class="font-bold mb-1 text-white text-4xl">{{ Auth()->user()->name[0] }}</h1>
        </div>
        <div class="">
            <h3 class="text-gray-600 text-2xl font-semibold">{{ Auth()->user()->name }}</h3>
            <!-- <p class="text-gray-500 text-md font-semibold">{{-- '@'.Auth()->user()->username --}}</p> -->
            <a href="" class="block mt-2 text-center border-2 text-gray-500 text-sm border-gray-500 rounded-xl px-4 py-2">Follow</a>
        </div>
    </div>
    <div class="menu mt-6 text-center flex border shadow-md bg-gray-100 rounded-md">
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
