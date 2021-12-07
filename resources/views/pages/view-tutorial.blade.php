@extends('layouts.app')

@section('title', 'View Course')

@section('content')

    @foreach ($datas as $data)
        <section class="max-w-7xl mt-20 md:mx-auto mx-4 shadow-lg rounded-b-lg">
            <div class="relative text-left bg-blue-500 rounded-t-lg" id="particles-js">
                <div class="absolute w-full py-8 md:px-12 px-4">
                    <h1 class="text-white font-semibold md:text-2xl text-xl">{{ $data->name }}</h1>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center">
                            <p class=" bg-white px-2 py-1 rounded-md md:text-sm text-xs text-blue-500 mr-2">
                                {{ $data->type }} </p>
                            <p class=" bg-white px-2 py-1 rounded-md md:text-sm text-xs text-blue-500">
                                {{ $data->level }} </p>
                        </div>
                        <div>
                            <p class="text-white md:text-lg text-xs">Disubmit oleh {{ $data->submitted_by }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <main class="py-8 md:px-12 px-4">
                <div class="flex flex-row-reverse justify-between items-center">
                    <div>
                        @if (Auth::check())
                            @livewire('like-save', ['datas' => $datas, 'users_id' => Auth()->user()->id,
                            'tutorials_id' => $data->id, 'vote' => 1])
                        @else
                            @livewire('like-save', ['datas' => $datas, 'users_id' => 0, 'tutorials_id' => $data->id,
                            'vote' => 1])
                        @endif
                    </div>
                    <div class="author">
                        <h2 class="text-gray-600 font-semibold md:text-2xl text-base mb-1">Author</h2>
                        <p class="text-gray-500 md:text-sm text-xs">{{ $data->author }}</p>
                    </div>
                </div>
                <div class="mt-6 description">
                    <h2 class="text-gray-600 font-semibold md:text-2xl text-base mb-1">Description</h2>
                    <p class="text-gray-500 md:text-sm text-xs">{{ $data->description }}</p>
                </div>
                <div class="mt-6 btn-mulai-belajar text-right">
                    <a class="md:inline-block block bg-blue-600 px-6 md:py-4 py-2 rounded-md md:text-xl text-base text-center font-semibold text-white hover:bg-blue-700 transition"
                    href="{{ $data->source_link }}">Mulai Belajar</a>
                </div>
                <hr class="mt-4">
            </main>
        </section>
    @endforeach
@endsection
