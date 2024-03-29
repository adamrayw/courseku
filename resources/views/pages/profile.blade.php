@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @if (session('success'))
        <div class="mb-2 alert alert-success" x-data="{cookies: true}" x-show="cookies">
            <div class="bg-green-200 flex border-green-600 text-green-600 border-l-4 p-4" role="alert">
                <div>
                    <p class="font-bold">
                        Success
                    </p>
                    <p>
                        {{ session('success') }}
                    </p>
                </div>
                <div class="ml-auto">
                    <p class="cursor-pointer" @click="cookies = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </p>
                </div>
            </div>
        </div>
    @endif
    @if (session('successDelete'))
        <div class="mb-2 alert alert-success" x-data="{cookies: true}" x-show="cookies">
            <div class="bg-green-200 flex border-green-600 text-green-600 border-l-4 p-4" role="alert">
                <div>
                    <p class="font-bold">
                        Success
                    </p>
                    <p>
                        {{ session('successDelete') }}
                    </p>
                </div>
                <div class="ml-auto">
                    <p class="cursor-pointer" @click="cookies = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </p>
                </div>
            </div>
        </div>
    @endif
    <section class="my-20 max-w-3xl mx-4 md:mx-auto h-4/6">
        <div class="flex flex-col md:flex-row">
            <div class="flex items-start">
                <div class="bg-blue-500 w-24 h-24 p-4 flex justify-center items-center mr-4 rounded-md">
                    <h1 class="font-bold mb-1 text-white text-4xl">{{ Auth()->user()->name[0] }}</h1>
                </div>
                <div>
                    <h3 class="text-gray-600 text-2xl font-semibold">{{ Auth()->user()->name }}</h3>
                    <p class="mt-1 text-gray-500 text-sm">Member Since :
                        {{ Auth()->user()->created_at->toFormattedDateString() }}</p>
                </div>
            </div>
            <div class="md:ml-auto">
                <div class="mt-2 md:mt-0">
                    <div class="flex items-center">
                        <!-- <i class="fas fa-question-circle fa-sm"></i> -->
                        <p class="font-medium text-gray-600">Reputation </p>
                        <div class="group cursor-pointer relative inline-block text-blue-600 text-center ml-2"><i
                                class="fas fa-question-circle fa-sm"></i>
                            <div
                                class="opacity-0 w-28 bg-gray-600 border border-gray-600 text-white text-center text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 bottom-full -left-0 ml-1 px-3 pointer-events-none">
                                Get points by submitting course.
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center">
                        <i class="fas fa-star fa-sm text-blue-600 mr-2"></i>
                        <p class="text-gray-500">{{ Auth()->user()->points }} Points</p>
                    </div>
                    <!-- <a href="#!" class="mt-2 inline-block text-center border-2 text-gray-500 text-sm border-gray-500 rounded-md px-6 py-2">Follow</a> -->
                </div>
                <!-- <p class="text-gray-500 text-md font-semibold">{{-- '@'.Auth()->user()->username --}}</p> -->
            </div>
        </div>
        <div class="mt-8 " x-data="{active: 0}">
            <div class="flex bg-blue-500 text-white overflow-hidden rounded-tr-lg rounded-tl-lg">
                <button class="px-4 py-2 w-full" x-on:click.prevent="active = 0"
                    x-bind:class="{'bg-blue-700 text-blue-500 ': active === 0}"><i class="fas fa-thumbs-up"></i></button>
                <button class="px-4 py-2 w-full" x-on:click.prevent="active = 1"
                    x-bind:class="{'bg-blue-700 text-blue-500 ': active === 1}"><i class="fas fa-bookmark"></i></button>
                <button class="px-4 py-2 w-full" x-on:click.prevent="active = 2"
                    x-bind:class="{'bg-blue-700 text-blue-500': active === 2}"><i class="fas fa-paper-plane"></i></button>
            </div>
            <div class="bg-gray-50">
                <div class="p-4 bg-white shadow rounded-bl rounded-br space-y-2 h-60 overflow-auto"
                    x-show.transition.in="active === 0">
                    @if (count($votes) == 0)
                        <div class="flex justify-center items-center p-9 bg-white space-y-2 overflow-auto"
                            x-show.transition.in="active === 0">
                            <div class="flex flex-col justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                    viewBox="0 0 172 172" style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                        stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                        text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#3b82f6">
                                            <path
                                                d="M101.53711,7.16667l-47.18522,47.26921c-2.68033,2.6875 -4.18522,6.32178 -4.18522,10.12012v71.61068c0,7.91917 6.41417,14.33333 14.33333,14.33333h64.44401c5.72617,0 10.90688,-3.41089 13.17155,-8.67839l21.55599,-50.18066c0.76683,-1.7845 1.16178,-3.71278 1.16178,-5.65494v-14.31934c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333h-45.51953l6.71875,-30.79427c1.04633,-4.80167 -0.45677,-9.8152 -3.96127,-13.26953zM7.16667,64.5v86h28.66667v-86z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <h1 class="text-gray-600 text-center">Tidak ada course yang dilike.</h1>
                            </div>
                        </div>
                    @endif
                    @foreach ($votes as $vote)
                        <div class="card">
                            @if ($vote->tutorial)
                                <a href="/course/{{ $vote->tutorial->slug }}"
                                    class="text-gray-600">{{ $vote->tutorial->name }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="p-4 bg-white shadow rounded-bl rounded-br space-y-2 h-60 overflow-auto"
                    x-show.transition.in="active === 1">
                    @if (count($saves) == 0)
                        <div class="flex justify-center items-center p-9 bg-white space-y-2 overflow-auto"
                            x-show.transition.in="active === 1">
                            <div class="flex flex-col justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                    viewBox="0 0 172 172" style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                        stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                        text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#3b82f6">
                                            <path
                                                d="M132.58333,154.08333l-46.58333,-21.5l-46.58333,21.5v-121.83333c0,-7.88333 6.45,-14.33333 14.33333,-14.33333h64.5c7.88333,0 14.33333,6.45 14.33333,14.33333z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <h1 class="text-gray-600 text-center">Tidak ada course yang dibookmark.</h1>
                            </div>
                        </div>
                    @endif

                    @foreach ($saves as $save)
                        <div class="card">
                            @if ($save->tutorials)
                                <a href="/course/{{ $save->tutorials->slug }}" class="text-gray-600">
                                    {{ $save->tutorials->name }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="p-4 bg-white shadow rounded-bl rounded-br space-y-2 h-60 overflow-auto"
                    x-show.transition.in="active === 2">
                    @if (count($submits) == 0)
                        <div class="flex justify-center items-center p-4 bg-white space-y-2 overflow-auto"
                            x-show.transition.in="active === 2">
                            <div class="flex flex-col justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                    viewBox="0 0 172 172" style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                        stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                        text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#3b82f6">
                                            <path
                                                d="M149.06667,17.2c-0.55025,0.00377 -1.09709,0.08674 -1.6237,0.24635c-0.15501,0.04207 -0.30818,0.09064 -0.45911,0.14557l-126.05495,40.08854v0.02239c-2.23962,0.83573 -3.72568,2.97333 -3.72891,5.3638c0.00425,2.00222 1.05271,3.85719 2.76589,4.89349l38.30807,30.39114l75.73151,-60.35677l-60.35677,75.73151l30.36875,38.28567c1.0349,1.7286 2.90117,2.78714 4.91589,2.78828c2.39047,-0.00322 4.52807,-1.48928 5.3638,-3.72891h0.02239l40.12214,-126.16692c0.041,-0.11449 0.07834,-0.23027 0.11198,-0.34714c0.15961,-0.52661 0.24258,-1.07345 0.24636,-1.6237c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <h1 class=" text-gray-600 text-center">Anda belum pernah mengirim course.</h1>
                                <a href="/submit-tutorial" class="mt-1 text-gray-400 underline text-center">Kirim course
                                    disini</a>
                            </div>
                        </div>
                    @endif

                    @foreach ($submits as $submit)
                        <div class="card">
                            <div>
                                <div class="flex flex-col justify-start items-start mb-4">
                                    <h3 class="font-medium text-gray-600 mb-2">
                                        {{ $submit->name }}</h3>
                                    <div class="inline-block text-xs">
                                        @if ($submit->status == 'Draft')
                                            <div class="flex items-center">
                                                <p
                                                    class="inline-block bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-lg font-semibold">
                                                    Sedang ditinjau</p>
                                                <i class="text-gray-400 mx-1">•</i>
                                                <div x-data="{ showModal : false }">
                                                    <button class="mx-1 text-red-500" @click="showModal = !showModal"><i
                                                            class="fas fa-trash"></i></button>
                                                    <div x-show=" showModal"
                                                        class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                                        x-transition:enter="transition ease duration-300"
                                                        x-transition:enter-start="opacity-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="transition ease duration-300"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0">
                                                        <!-- Modal -->
                                                        <div x-show="showModal"
                                                            class="bg-white rounded-xl shadow-2xl px-6 pb-6 w-full sm:w-5/12 mx-4"
                                                            @click.away="showModal = false"
                                                            x-transition:enter="transition ease duration-100 transform"
                                                            x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                                                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                                            x-transition:leave="transition ease duration-100 transform"
                                                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                                            x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                                            <h1 class="text-center mt-6 mb-2 font-bold text-xl">Apakah kamu
                                                                yakin ingin
                                                                menghapusnya?</h1>
                                                            <div class="flex justify-center items-center mt-6">
                                                                <button @click="showModal = !showModal"
                                                                    class="px-4 py-2 text-sm mx-1 bg-gray-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-gray-700 focus:bg-indigo-50 focus:text-gray-200">Batal</button>
                                                                <form action="/delete-course" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $submit->id }}">
                                                                    <button
                                                                        class="px-4 py-2 text-sm mx-1 bg-red-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-red-700 focus:bg-indigo-50 focus:text-gray-200">Ya,
                                                                        yakin</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($submit->status == 'Release')
                                            <p
                                                class="inline-block bg-green-100 rounded-lg text-green-700 text-xs px-1 py-1 font-semibold">
                                                Disetujui</p>
                                            <i class="text-gray-400 mx-1">•</i>
                                            <a href="/course/{{ $submit->slug }}"
                                                class="inline-block text-sm  py-1 capitalize text-gray-500 hover:text-gray-700">
                                                Lihat
                                            </a>
                                            <i class="text-gray-400 mx-1">•</i>
                                            <p class="inline-block text-sm text-gray-500">
                                                {{ $submit->views }}x dilihat
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <hr class="w-full text-gray-200">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
@endsection
