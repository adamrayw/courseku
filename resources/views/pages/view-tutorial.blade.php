@extends('layouts.app')

@section('title', 'View Course')

@section('content')

    @foreach ($datas as $data)
        <section class="max-w-5xl mt-20 md:mx-auto mx-4 shadow-lg rounded-b-lg">
            <div class="relative text-left bg-blue-500 md:h-36 h-40 rounded-t-lg" id="particles-js">
                <div class="absolute w-full py-8 md:px-12 px-4">
                    <h1 class="text-white font-semibold md:text-2xl text-xl">{{ $data->name }}</h1>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center">
                            <p class="shadow-lg bg-white px-2 py-1 rounded-md md:text-sm text-xs text-blue-500 mr-2">
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
                <div class="mt-6 btn-mulai-belajar">
                    <a class="md:inline-block block bg-blue-600 px-6 md:py-2 py-2 rounded-md md:text-lg text-base text-center font-semibold text-white hover:bg-blue-700 transition"
                        href="{{ $data->source_link }}">Mulai Belajar</a>
                </div>
                <hr class="mt-4">
                <div class="mt-6">
                    @auth
                        <form method="POST">
                            @csrf
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="tutorials_id" value="{{ $data->id }}">
                            <textarea type="text"
                                class="w-full md:inline-block block border border-transparent px-4 py-2 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                name="comment" placeholder="Ketik Komentar..." required></textarea>
                            <button type="submit" class="px-4 py-2 bg-blue-500 active:bg-blue-700 shadow-lg transition text-white rounded-md">POST</button>
                        </form>
                    @endauth
                </div>
            </main>
        </section>
    @endforeach
@endsection
