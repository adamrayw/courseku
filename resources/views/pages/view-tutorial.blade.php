@extends('layouts.app')

@section('title', 'View Course')

@section('content')

    @foreach ($datas as $data)
        @if ($data->status == 'Draft' || $data->status == '')
            <div class="text-center my-20">
                <i class="fas fa-question-circle fa-3x mb-2 text-blue-500"></i>
                <h1 class="text-center text-gray-500 text-2xl">Course belum tersedia.</h1>
                <a href="/explore"
                    class="animate__delay-2s inline-block font-semibold mt-6 rounded-lg no-underline text-white bg-blue-500 hover:bg-blue-700 transition-all px-6 py-2">Go
                    to Explore</a>
            </div>
        @else
            <div class="max-w-4xl my-20 md:px-4 px-0 md:mx-auto mx-4 grid grid-cols-1 gap-y-6 justify-items-start">
                <section class="md:col-span-2 w-full md:mx-auto shadow-lg rounded-b-lg">
                    <div class="relative flex justify-center items-center text-left bg-blue-500 py-8 md:h-44 h-fit rounded-t-lg"
                        id="particles-js">
                        <div class="absolute w-full md:px-12 px-4">
                            <h1 class="text-white font-semibold md:text-2xl text-xl">{{ $data->name }}</h1>
                            <div class="flex justify-between items-center mt-6">
                                <div class="flex items-center">
                                    <p
                                        class="shadow-lg bg-white px-2 py-1 rounded-md md:text-sm text-xs text-blue-500 mr-2">
                                        {{ $data->type }} </p>
                                    <p class="shadow-lg bg-white px-2 py-1 rounded-md md:text-sm text-xs text-blue-500">
                                        {{ $data->level }} </p>
                                </div>
                                <div>
                                    <p class="text-white md:text-lg text-xs">Disubmit oleh {{ $data->submitted_by }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <main class="py-6 md:px-12 px-4">
                        <div class="flex justify-between items-center">
                            <div class="author">
                                <h2 class="text-gray-600 font-semibold md:text-2xl text-base mb-1">Author</h2>
                                <p class="text-gray-500 md:text-sm text-xs">{{ $data->author }}</p>
                            </div>
                        </div>
                        <div class="mt-6 description">
                            <h2 class="text-gray-600 font-semibold md:text-2xl text-base mb-1">Description</h2>
                            <p class="text-gray-500 md:text-sm text-xs">{{ $data->description }}</p>
                        </div>
                        <div class="mt-6 btn-mulai-belajar">
                            <a class="md:inline-block block bg-blue-500 px-6 md:py-2 py-2 rounded-md md:text-lg text-base text-center font-semibold text-white hover:bg-blue-700 transition"
                                href="{{ $data->source_link }}">Mulai Belajar</a>
                        </div>
                        <hr class="mt-4 text-gray-300">
                        <div class="mt-6">

                            <div x-data="{ showModal : false }">
                                <div class="flex justify-end items-center">
                                    <div>
                                        @if (Auth::check())
                                            @livewire('like-save', ['datas' => $datas, 'users_id' => Auth()->user()->id,
                                            'tutorials_id' => $data->id, 'vote' => 1])
                                        @else
                                            @livewire('like-save', ['datas' => $datas, 'users_id' => 0, 'tutorials_id' =>
                                            $data->id,
                                            'vote' => 1])
                                        @endif
                                    </div>
                                    <button @click="showModal = !showModal" class="text-lg  ml-6 text-gray-600"><i
                                            class="far fa-comment fa-lg mr-1"></i> {{ count($data->comments) }}</button>
                                </div>

                                <div x-show=" showModal"
                                    class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                    x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                    <!-- Modal -->
                                    <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-full sm:w-5/12 mx-4"
                                        @click.away="showModal = false"
                                        x-transition:enter="transition ease duration-100 transform"
                                        x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                        x-transition:leave="transition ease duration-100 transform"
                                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                        <div class="mb-1 flex justify-between items-center">
                                            <h1 class="text-right text-xl">Comments
                                            </h1>
                                            <div class="text-center">
                                                <button @click="showModal = !showModal" class=""><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-1 h-60 overflow-auto">
                                            @if (count($data->comments) == 0)
                                                <p class="text-center my-10 text-gray-500">No comments yet</p>
                                            @endif
                                            @foreach ($data->comments as $comm)
                                                <div
                                                    class="flex md:flex-row flex-col justify-between md:items-center items-start my-4">
                                                    <div class="flex items-center ">
                                                        <div
                                                            class="flex justify-center items-center md:h-10 h-8 py-2 md:px-4 px-3 mr-3 text-white bg-gray-600 rounded-full">
                                                            <p class="md:text-sm text-xs">{{ $comm->user->name[0] }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="font-medium md:text-base text-sm text-gray-600">
                                                                {{ $comm->user->name }}</p>
                                                            <p class="md:text-sm text-xs text-gray-500 break-words">
                                                                {{ $comm->comment }}</p>
                                                        </div>
                                                    </div>
                                                    <p
                                                        class="text-gray-400 md:mt-0 mt-2 ml-auto text-right md:text-sm text-xs font-light">
                                                        {{ $comm->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                                <hr class="text-gray-200">
                                            @endforeach
                                        </div>
                                        <div class="mt-6">
                                            @if (Auth::user())
                                                <form method="POST">
                                                    @csrf
                                                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="tutorials_id" value="{{ $data->id }}">
                                                    <div>
                                                        <textarea type="text"
                                                            class="w-full mb-2 text-xs inline-block border border-transparent px-4 py-2 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                                            name="comment" placeholder="Ketik Komentar..."
                                                            required></textarea>
                                                    </div>
                                                    <div class="text-right ">
                                                        <button type="submit"
                                                            class="px-4 py-2 md:textt-base text-sm bg-blue-500 active:bg-blue-700 shadow-lg transition text-white rounded-md">POST</button>
                                                    </div>
                                                </form>
                                            @else
                                                <h2 class="text-blue-500 text-center">You must <a class="underline semibold"
                                                        href="/login">Login</a>
                                                    to comment!</h2>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </section>
                <!-- Slider main container -->
                <div class="w-full">
                    <h1 class="text-xl text-gray-600 font-semibold mb-4">Course lainnya</h1>
                    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "wrapAround" :
                                                                        true, "prevNextButtons" : false, "lazyLoad" : 2 }'>
                        @foreach ($randomCourse as $random)
                            <div
                                class="carousel-cell md:w-96 w-full shadow h-28 mr-5 rounded-lg bg-blue-500 px-6 py-4 text-gray-600">
                                <h2 class="text-lg line-clamp-2 font-semibold text-white">
                                    {{ $random->name }}
                                </h2>
                                <p class="text-xs text-white font-light mt-1">{{ $random->author }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
