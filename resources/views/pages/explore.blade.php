@extends('layouts.app')

@section('title', 'Explore')

@section('content')
    <section class="mt-20 text-center max-w-5xl mx-auto px-4">
        <div>
            <h1 class="font-bold mb-1 text-gray-600 text-4xl">Explore</h1>
        </div>
        <div>
            <form method="GET">
                <div>
                    <div class="mt-8 relative rounded-lg shadow">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" name="search" id="search"
                            class=" block w-full px-10 py-4 sm:text-sm border border-transparent rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="Cari course...">

                    </div>
                </div>
            </form>
        </div>
        <div class="what-you-learn mb-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-6">
                @foreach ($tutorials as $tutorial)
                    @if ($tutorial != null)
                        <a href="/course/{{ $tutorial->slug }}">
                            <div
                                class="card relative bg-white border border-gray-200 text-left shadow-sm p-4 rounded-lg hover:shadow-lg transition">
                                <div class="mb-4">
                                    <p class="mb-1 font-semibold text-base text-gray-600">{{ $tutorial->name }}
                                    </p>
                                    <p class="text-xs text-gray-500">{{ $tutorial->author }}</p>
                                    <div class="flex justify-between items-center mt-6">
                                        <div class="flex items-center">
                                            <p class=" bg-blue-500 px-2 py-1 rounded-md  text-xs text-white mr-2">
                                                {{ $tutorial->type }} </p>
                                            <p class=" bg-blue-500 px-2 py-1 rounded-md  text-xs text-white">
                                                {{ $tutorial->level }} </p>
                                        </div>
                                        <div>


                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <p class="text-xs text-gray-500">Disubmit oleh {{ $tutorial->submitted_by }}
                                    </p>
                                    <div class="flex justify-end items-center font-thin">
                                        <p class="text-sm text-gray-500"><i class="fas fa-thumbs-up mr-1"></i>
                                            {{ count($tutorial->votes) }}</p>
                                        <p class="text-sm ml-3 text-gray-500"><i class="fas fa-comment mr-1"></i>
                                            {{ count($tutorial->comments) }}</p>
                                    </div>
                                </div>
                                {{-- <p
                                    class="absolute right-0 top-0 bg-blue-500 px-2 py-1 rounded-bl-md rounded-tr-md text-sm text-white">
                                    {{ $tutorial->type }} </p> --}}
                            </div>
                        </a>
                    @else
                        <p>Not Found</p>
                    @endif
                @endforeach
            </div>
            {{ $tutorials->links() }}
        </div>
    </section>
@endsection
