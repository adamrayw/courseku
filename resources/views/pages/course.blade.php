@extends('layouts.app')

@section('title', 'Course')

@section('content')
<section class="mt-20 text-center max-w-5xl mx-auto px-4">
    <div>
        <h1 class="font-bold mb-1 text-gray-600 text-4xl">{{ $name_category }}</h1>
    </div>
    <div class="what-you-learn mb-20">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-6">
            @foreach ($courses as $course)
            <a href="/course/{{ $course->name }}">
                <div class="card flex items-center shadow p-4 rounded-lg hover:bg-gray-100 transition">
                    {!! $course->img_url !!}
                    <p class="ml-2 text-gray-600">{{ $course->slug }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
