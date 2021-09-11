@extends('layouts.app')
@foreach ($courses as $c)
@section('title', $c->name)
@section('content')

<section class="mt-20 text-center max-w-5xl mx-auto px-4">
    <div>
        <h1 class="font-bold mb-1 text-gray-600 text-4xl">{{ $c->name }}</h1>
    </div>
    <hr class="my-2">
    <div class="what-you-learn mb-20">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-6">

            @foreach ($c->course as $f)
            <a href="/learn/{{ $f->slug }}">
                <div class="card flex items-center shadow-sm p-4 bg-white border border-gray-200 rounded-lg hover:shadow-lg transition">
                    {!!$f->img_url!!}
                    <p class="ml-2 text-gray-600">{{$f->name}}</p>
                </div>
            </a>
            @endforeach

        </div>
        <div>
            @if (count($c->course) < 1) <p class="text-center my-2 text-gray-600">Sorry, No Course Found</p> @endif
        </div>
    </div>
</section>
@endsection
@endforeach
