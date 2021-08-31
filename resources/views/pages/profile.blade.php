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
                <p class="text-gray-500 text-sm">Member Since : {{ Auth()->user()->created_at->toFormattedDateString() }}</p>
            </div>
        </div>
        <div class="">
            <div class="mt-2 md:mt-0">
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
        <div class="flex bg-white overflow-hidden">
            <button class="px-4 py-2 border-b border-gray-400 text-gray-600 w-full" x-on:click.prevent="active = 0" x-bind:class="{'border-blue-600 ': active === 0}">Liked</button>
            <button class="px-4 py-2 border-b border-gray-400 text-gray-600 w-full" x-on:click.prevent="active = 1" x-bind:class="{'border-blue-600 ': active === 1}">Saved</button>
            <button class="px-4 py-2 border-b border-gray-400 text-gray-600 w-full" x-on:click.prevent="active = 2" x-bind:class="{'border-blue-600': active === 2}">Submitted</button>
        </div>
        <div class=" bg-opacity-10">
            <div class="p-4 bg-white space-y-2" x-show.transition.in="active === 0">
                {{ count($datas) }}
                @if(count($datas) == 0) <div class="flex flex-col justify-center items-center">
                    <img src="img/like.png" alt="like" class="block">
                    <h1 class="mt-2 text-gray-600">No tutorials liked.</h1>
                </div>
                @endif
                @foreach ($datas as $data)
                <div class="card">
                    <h4 class="text-gray-600">{{ $data->tutorial }}</h4>
                </div>
                @endforeach
                @foreach ($datas as $data)
                <div class="card">
                    @if ($data->tutorial)
                    <h4 class="text-gray-600">{{ $data->tutorial->name }}</h4>
                    @endif
                </div>
                @endforeach
            </div>
            <div class="p-4 bg-white space-y-2" x-show.transition.in="active === 1">
                <div class="flex flex-col justify-center items-center">
                    <img src="img/save.png" alt="save" class="block">
                    <h1 class="mt-2 text-gray-600">No tutorials saved.</h1>
                </div>
            </div>
            <div class="p-4 bg-white space-y-2" x-show.transition.in="active === 2">
                <div class="flex flex-col justify-center items-center">
                    <img src="img/submitted.png" alt="submit" class="block">
                    <h1 class="mt-2 text-gray-600">You haven't sent the tutorial</h1>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
