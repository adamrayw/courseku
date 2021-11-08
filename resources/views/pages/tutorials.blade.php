@extends('layouts.app')

@section('title', 'Course')

@section('content')
<section class="mt-20 text-center max-w-5xl mx-auto px-4">
    <div class="text-left">
        <h1 class="font-bold mb-1 text-gray-600 sm:text-3xl text-xl">Learn {{ $name_course }}</h1>
        <p class="sm:text-lg text-sm text-gray-500">Let's learn {{ strtolower($name_course) }}, this course is sent from the programming community.</p>
    </div>
    <div class="what-you-learn mb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-6">
            @foreach ($tutorials as $tutorial)
            <a href="/course/{{ $tutorial->slug }}">
                <div class="card relative bg-white border border-gray-200 text-left shadow-sm p-4 rounded-lg hover:shadow-lg transition">
                    <div class="mb-8">
                        <p class="ml-2 mb-1 pr-8 font-semibold text-xl text-gray-600">{{ $tutorial->name }}</p>
                        <p class="ml-2 text-xs text-gray-500">{{ $tutorial->author }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <p class="text-xs ml-2 text-gray-500">Submitted by {{ $tutorial->submitted_by }}</p>
                        </div>
                        <div class="flex items-center font-thin">
                            <p class="text-sm ml-2 text-gray-500"><i class="fas fa-thumbs-up mr-1"></i> {{ count($tutorial->votes) }}</p>
                            <p class="text-sm ml-3 text-gray-500"><i class="fas fa-comment mr-1"></i> {{ count($tutorial->comments) }}</p>
                        </div>
                    </div>
                    <p class="absolute right-0 top-0 bg-blue-500 px-2 py-1 rounded-bl-md rounded-tr-md text-sm text-white">{{$tutorial->type}} </p>
                </div>
            </a>
            @endforeach
        </div>
        @if (count($tutorials) == 0)
        <div class="p-6 rounded-md shadow-md md:w-1/3 w-full mx-auto">
            <h5 class="text-xl font-semibold text-center text-gray-600">Tutorials not Found</h5>
            <p class="text-center text-gray-500 text-sm">Help us find tutorials for {{ $slug }}</p>
            <a href="/submit-tutorial" type="submit" class="mt-4 bg-blue-500 text-white px-6 py-2 text-sm rounded-md hover:bg-blue-800 transition">Submit tutorial</a>
        </div>
        @endif
    </div>
</section>
@endsection
