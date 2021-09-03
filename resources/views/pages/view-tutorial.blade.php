@extends('layouts.app')

@section('title', 'View Tutorial')

@section('content')
@foreach ($datas as $data)
<section class="mt-20 text-center w-full md:w-4/12 mx-auto px-4">

    @if(session()->has('status'))
    <div class="" role="alert">
        {{ session('status') }}
    </div>
    @endif


    <div class="view-tutorial flex-row justify-center mb-10">
        <img class="rounded-t-md" src="https://source.unsplash.com/700x200?coding" alt="img-card">
        <div class="p-4 bg-white shadow-md rounded-b-md text-left">
            <div class="flex justify-between items-center">
                <div class=" mb-2">
                    <div>
                        <h2 class="font-bold text-lg text-gray-600">{{ $data->name }}</h2>
                    </div>
                    <div class="creator mt-1">
                        <p class="text-sm text-gray-500">{{ $data->author }}</p>
                    </div>
                    <!-- <p class="text-xs my-2 text-gray-500 mt-2">Di submit oleh {{ $data->submitted_by }}</p> -->
                </div>
                <div>
                    @if (Auth::check())
                    @livewire('like-save', ['datas' => $datas, 'users_id' => Auth()->user()->id, 'tutorials_id' => $data->id, 'vote' => 1])
                    @else
                    @livewire('like-save', ['datas' => $datas, 'users_id' => 0, 'tutorials_id' => $data->id, 'vote' => 1])
                    @endif
                </div>
            </div>
            <div class="flex items-center mb-4">
                <p class="text-xs rounded-md bg-gray-600 text-white p-2">{{ $data->type }}</p>
                <p class="text-xs rounded-md ml-2 bg-gray-600 text-white p-2">{{ $data->level }}</p>
            </div>
            <div class=" description my-2">
                @if($data->type == ' Video') <h2 class="text-lg font-semibold mb-2 text-gray-600">Description</h2>
                @endif
                <p class="text-sm text-gray-500 text-justify">{{ $data->description }}</p>
            </div>
            <hr class="mb-4">
            <a class="block bg-blue-600 px-4 py-2 rounded-md text-center text-white hover:bg-blue-700 transition" href="{{ $data->source_link }}">Start Learning!</a>

        </div>
    </div>
    <div class="comments-section text-left my-2">
        <div class="">
            <div>
                <div class="">
                    <!-- Modal -->
                    <div x-data="{ showModal : false }">
                        <!-- Button -->
                        <div class="overflow-hidden">
                            @if (Auth::check())
                            <form action="/course/{{$data->slug}}/comment" method="POST">
                                @csrf
                                <div class="px-1">
                                    <input type="text" name="tutorials_id" class="hidden" value="{{ $data->id }}">
                                    <input type="text" name="users_id" class="hidden" value="{{ Auth()->user()->id }}">
                                    <textarea name="comment" id="comment" class="border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring-2 ring-blue-200" placeholder="Write your comment here..."></textarea>
                                    <button type="input" class="w-full px-4 py-2 text-sm bg-blue-600 rounded-md border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-bold hover:bg-blue-700 focus:bg-indigo-50 focus:text-gray-200 float-right overflow-auto">POST</button>
                                </div>
                            </form>
                            @else
                            <div class="text-center">
                                <p class="text-gray-600">You must <a href="/login" class="underline">login</a> to comment!</p>
                            </div>
                            @endif
                        </div>


                    </div>

                </div>
            </div>
            <div class="mt-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-gray-600">{{ count($data->comments) }} Comments </h2>
                    <p class="font-medium text-gray-600 text-sm">Sort By Newest<i class="fas fa-sort-down ml-1 fa-lg text-gray-600"></i></p>
                </div>
                @if (count($data->comments) > 0)
                @for ($i = 0; $i < count($data->comments); $i++)
                    <div class="flex items-start">
                        <div>
                            <p class="bg-gray-600 text-xl w-10 h-10 flex justify-center items-center mr-2 rounded-full text-white">{{ $data->comments[$i]->user->name[0]}}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">{{ $data->comments[$i]->user->name}}</p>
                            <p class="mb-2 text-xs text-gray-500">{{ $data->comments[$i]->comment}}</p>
                        </div>
                        <p class="font-thin text-xs text-gray-400 ml-auto"> {{$data->comments[$i]->created_at->diffForHumans()}}</p>
                    </div>
                    <hr class="mt-2 mb-4">
                    @endfor
                    @else
                    <p class="text-center text-gray-500">No comments yet</p>
                    @endif
            </div>
        </div>
    </div>
    </div>
</section>
@endforeach
@endsection
