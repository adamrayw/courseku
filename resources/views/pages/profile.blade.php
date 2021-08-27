@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<section class="mt-20 w-5/6 mx-auto p-4 rounded-md">
    <div class="flex items-start">
        <div class="bg-gray-500 w-24 h-24 rounded-md p-4 flex justify-center items-center mr-4">
            <h1 class="font-bold mb-1 text-white text-4xl">{{ Auth()->user()->name[0] }}</h1>
        </div>
        <div>
            <h3 class="text-gray-600 text-2xl font-semibold">{{ Auth()->user()->id }}</h3>
            <p class="text-gray-500 text-md font-semibold">{{ '@'.Auth()->user()->username }}</p>
            <p class="text-gray-500 text-md font-semibold">{{-- Auth()->user()->username --}}</p>
        </div>
    </div>
    <div class="what-you-learn mb-20">

    </div>
</section>
@endsection
