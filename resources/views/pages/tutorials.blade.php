@extends('layouts.app')

@section('title', 'Course')

@section('content')
<section class="mt-20 text-center max-w-5xl mx-auto px-4">
    <div>
        <h1 class="font-bold mb-1 text-gray-600 text-4xl">Learn {{ $name_course }}</h1>
    </div>
    <div class="what-you-learn mb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-6">
            @foreach ($tutorials as $tutorial)
            <a href="/course/{{ $tutorial->slug }}">
                <div class="card relative text-left shadow p-4 rounded-lg hover:bg-gray-100 transition">
                    <div class="mb-8">
                        <p class="ml-2 mb-1 pr-8 font-semibold text-xl truncate text-gray-700">{{ $tutorial->name }}</p>
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
                    <p class="absolute right-0 top-0 @if ($tutorial->type == 'Article') bg-blue-600 @else bg-gray-600 @endif  px-2 py-1 rounded-bl-md rounded-tr-md text-sm text-white">{{ $tutorial->type }}</p>
                </div>
            </a>
            @endforeach
        </div>
        @if (count($tutorials) < 1) <p class="my-4 text-center">Tutorial not Found</p>
            @endif
    </div>
</section>
@endsection
