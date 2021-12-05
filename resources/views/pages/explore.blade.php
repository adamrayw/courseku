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
                            class="focus:ring-indigo-500 border-2 block w-full px-10 py-4 sm:text-sm border-gray-300 rounded-md"
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
                                <div class="mb-8">
                                    <p class="ml-2 mb-1 pr-8 font-semibold text-xl text-gray-600">{{ $tutorial->name }}
                                    </p>
                                    <p class="ml-2 text-xs text-gray-500">{{ $tutorial->author }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <p class="text-xs ml-2 text-gray-500">Submitted by {{ $tutorial->submitted_by }}
                                        </p>
                                    </div>
                                    <div class="flex items-center font-thin">
                                        <p class="text-sm ml-2 text-gray-500"><i class="fas fa-thumbs-up mr-1"></i>
                                            {{ count($tutorial->votes) }}</p>
                                        <p class="text-sm ml-3 text-gray-500"><i class="fas fa-comment mr-1"></i>
                                            {{ count($tutorial->comments) }}</p>
                                    </div>
                                </div>
                                <p
                                    class="absolute right-0 top-0 bg-blue-500 px-2 py-1 rounded-bl-md rounded-tr-md text-sm text-white">
                                    {{ $tutorial->type }} </p>
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
