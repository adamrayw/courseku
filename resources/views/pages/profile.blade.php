@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<section class="my-20 max-w-3xl mx-4 md:mx-auto h-4/6">
    <div class="flex flex-col md:flex-row">
        <div class="flex items-start">
            <div class="bg-gray-500 w-24 h-24 p-4 flex justify-center items-center mr-4 rounded-md">
                <h1 class="font-bold mb-1 text-white text-4xl">{{ Auth()->user()->name[0] }}</h1>
            </div>
            <div>
                <h3 class="text-gray-600 text-2xl font-semibold">{{ Auth()->user()->name }}</h3>
                <p class="mt-1 text-gray-500 text-sm">Member Since : {{ Auth()->user()->created_at->toFormattedDateString() }}</p>
            </div>

        </div>
        <div class="md:ml-auto">
            <div class="mt-2 md:mt-0">
                <div class="flex items-center">
                    <!-- <i class="fas fa-question-circle fa-sm"></i> -->
                    <i class="fas fa-star fa-sm text-yellow-400"></i>
                    <p class="ml-1 font-medium text-gray-600">Stars </p>
                    <div class="group cursor-pointer relative inline-block text-blue-600 text-center ml-2"><i class="fas fa-question-circle fa-sm"></i>
                        <div class="opacity-0 w-28 bg-gray-600 border border-gray-600 text-white text-center text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 bottom-full -left-0 ml-1 px-3 pointer-events-none">
                            Get stars by submitting tutorials.
                        </div>
                    </div>
                </div>
                <div class="mt-1">
                    <p class="text-gray-500">0</p>
                </div>
                <!-- <a href="#!" class="mt-2 inline-block text-center border-2 text-gray-500 text-sm border-gray-500 rounded-md px-6 py-2">Follow</a> -->
            </div>
            <!-- <p class="text-gray-500 text-md font-semibold">{{-- '@'.Auth()->user()->username --}}</p> -->
        </div>
    </div>
    <div class="mt-4 " x-data="{active: 0}">
        <div class="flex bg-gray-50 overflow-hidden">
            <button class="px-4 py-2 border-b border-gray-200 text-gray-600 w-full" x-on:click.prevent="active = 0" x-bind:class="{'border-blue-600 ': active === 0}">Liked</button>
            <button class="px-4 py-2 border-b border-gray-200 text-gray-600 w-full" x-on:click.prevent="active = 1" x-bind:class="{'border-blue-600 ': active === 1}">Bookmarked</button>
            <button class="px-4 py-2 border-b border-gray-200 text-gray-600 w-full" x-on:click.prevent="active = 2" x-bind:class="{'border-blue-600': active === 2}">Submitted</button>
        </div>
        <div class="bg-gray-50">
            <div class="p-4 bg-gray-50 space-y-2 h-60 overflow-auto" x-show.transition.in="active === 0">
                @if(count($votes) == 0) <div class="flex flex-col justify-center items-center">
                    <img src="https://img.icons8.com/cotton/100/000000/facebook-like--v2.png" />
                    <h1 class="mt-2 text-gray-600">No tutorials liked.</h1>
                </div>
                @endif
                @foreach ($votes as $vote)
                <div class="card">
                    @if ($vote->tutorial)
                    <a href="/course/{{ $vote->tutorial->slug }}" class="text-gray-600">{{ $vote->tutorial->name }}</a>
                    @endif
                </div>
                @endforeach
            </div>
            <div class="p-4 bg-gray-50 space-y-2 h-60 overflow-auto" x-show.transition.in="active === 1">
                @if(count($saves) == 0)
                <div class="flex flex-col justify-center items-center">
                    <img src="https://img.icons8.com/color/100/000000/bookmark-ribbon--v1.png" />
                    <h1 class="mt-2 text-gray-600">No tutorials bookmarked.</h1>
                </div>
                @endif

                @foreach ($saves as $save)
                <div class="card">
                    @if ($save->tutorials)
                    <a href="/course/{{ $save->tutorials->slug }}" class="text-gray-600"> {{ $save->tutorials->name  }}</a>
                    @endif
                </div>
                @endforeach
            </div>
            <div class="p-4 bg-gray-50 space-y-2 h-60 overflow-auto" x-show.transition.in="active === 2">
                @if (count($submits) == 0)
                <div class="flex flex-col justify-center items-center">
                    <img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/100/000000/external-send-contact-flatart-icons-flat-flatarticons.png" />
                    <h1 class="mt-2 text-gray-600">You don't have submissions.</h1>
                </div>
                @endif

                @foreach ($submits as $submit)
                <div class="card">
                    <div>
                        <div class="flex flex-col mb-4">
                            <a href="/course/{{ $submit->slug }}" class="text-gray-600"> {{ $submit->name  }}</a>
                            <div class="inline-block">
                                @if ($submit->status == 'Draft')
                                <p class="inline-block bg-gray-200 text-gray-700 text-xs px-1 py-1 rounded-sm font-semibold">Under Review</p>
                                @elseif ($submit->status == 'Release')
                                <p class="inline-block bg-green-100 text-green-700 text-xs px-1 py-1 rounded-sm font-semibold">Approved</p>
                                @endif
                                <i class="text-gray-400 mx-1">|</i>
                                <a href="/course/{{ $submit->slug }}" class="inline-block text-sm mx-1 capitalize text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <i class="text-gray-400 mx-1">|</i>
                                <a href="/course/{{ $submit->slug }}" class="inline-block text-sm mx-1 capitalize text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</section>
@endsection
