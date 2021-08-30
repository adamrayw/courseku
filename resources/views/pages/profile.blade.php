@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<section class="mt-20 max-w-3xl mx-4 md:mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-start">
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
    <div class="mt-4 " x-data="{active: 0}">
        <div class="flex overflow-hidden">
            <button class="px-4  py-2 w-full" x-on:click.prevent="active = 0" x-bind:class="{'bg-gray-600 rounded-md text-white': active === 0}">Liked</button>
            <button class="px-4 py-2 w-full" x-on:click.prevent="active = 1" x-bind:class="{'bg-gray-600 rounded-md text-white': active === 1}">Saved</button>
            <button class="px-4 py-2 w-full" x-on:click.prevent="active = 2" x-bind:class="{'bg-gray-600 rounded-md text-white': active === 2}">Submitted</button>
        </div>
        <div class="bg-black bg-opacity-10">
            <div class="p-4 bg-white space-y-2" x-show.transition.in="active === 0">
                <div class="">
                    @foreach ($datas as $data)
                    <div class="card">
                        <h4 class="text-gray-600">{{ $data->tutorial->id }}</h4>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="p-4 space-y-2" x-show.transition.in="active === 1">
                <h2 class="text-2xl">Panel 2 Using x-show.transition</h2>
                <p>Panel 2 content</p>
            </div>
            <div class="p-4 space-y-2" x-show.transition.in="active === 2">
                <h2 class="text-2xl">Panel 2 Using x-show.transition</h2>
                <p>Panel 2 content</p>
            </div>
        </div>
    </div>

</section>
@endsection
