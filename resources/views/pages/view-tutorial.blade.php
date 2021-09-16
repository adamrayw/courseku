@extends('layouts.app')

@section('title', 'View Tutorial')

@section('content')
@foreach ($datas as $data)
@if ($data->status == 'Draft')
<section class="my-20 text-center w-full md:w-4/12 mx-auto px-4">
    <div class="view-tutorial flex-row justify-center items-center mb-10">
        <img class="mx-auto w-40 md:w-60" src="{{asset('img/confused.svg')}}" alt="image">
        <h1 class="text-2xl font-bold text-gray-600 mt-6">Oops, this tutorial is not yet available.</h1>
    </div>
</section>
@else
<section class="mt-20 text-center w-full md:w-4/12 mx-auto px-4">
    <div class="view-tutorial flex-row justify-center mb-10">
        <img class="rounded-t-md" src="https://source.unsplash.com/700x300?coding" alt="img-card">
        <div class="p-4 bg-white border border-gray-200 shadow rounded-b-md text-left">
            <div class="flex justify-between items-center">
                <div class="mb-2">
                    <div class="">
                        <h2 class="font-bold text-lg text-gray-600 pr-8">{{ $data->name }}</h2>
                    </div>
                    <div class="creator mt-1">
                        <p class="text-sm text-gray-500">{{ $data->author }}</p>
                    </div>
                    <!-- <p class="text-xs my-2 text-gray-500 mt-2">Di submit oleh {{ $data->submitted_by }}</p> -->
                </div>

            </div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <p class="text-xs rounded-md bg-gray-600 text-white p-2">{{ $data->type }}</p>
                    <p class="text-xs rounded-md ml-2 bg-gray-600 text-white p-2">{{ $data->level }}</p>
                </div>
                <div>
                    @if (Auth::check())
                    @livewire('like-save', ['datas' => $datas, 'users_id' => Auth()->user()->id, 'tutorials_id' => $data->id, 'vote' => 1])
                    @else
                    @livewire('like-save', ['datas' => $datas, 'users_id' => 0, 'tutorials_id' => $data->id, 'vote' => 1])
                    @endif
                </div>
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
                            @if (Auth()->user()->status == 'Suspended')
                            <div class="text-center flex items-center bg-yellow-100 border border-yellow-600 p-4 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-h-12 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <p class="text-yellow-700 text-left ml-2">You can't comment, your account has been suspended!</p>
                            </div>
                            @else
                            <form action="/course/{{$data->slug}}" method="POST">
                                @csrf
                                <div class="px-1">
                                    <input type="text" name="tutorials_id" class="hidden" value="{{ $data->id }}">
                                    <input type="text" name="users_id" class="hidden" value="{{ Auth()->user()->id }}">
                                    <textarea name="comment" id="comment" class="border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring-2 ring-blue-200" placeholder="Write your comment here..." required></textarea>
                                    <div>
                                        <button type="submit" class="px-4 py-2 text-sm bg-blue-600 rounded-md border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-bold hover:bg-blue-700 focus:bg-indigo-50 focus:text-gray-200 float-right overflow-auto">POST</button>
                                    </div>
                                </div>
                            </form>
                            @endif
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
                    <h2 class="font-bold text-gray-600 mb-2">{{ count($data->comments) }} Comments </h2>
                    <!-- <form action="/course/{{ $data->slug }}" method="get">
                        @if(request('sortby') == 'desc')
                        <input type="hidden" name="sortby" value="asc">
                        <button type="submit">
                            <div class="flex items-start justify-start">
                                <p class="font-medium text-gray-600 text-sm">Sort By Oldest</p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        @elseif(request('sortby') == 'asc')
                        <input type="hidden" name="sortby" value="desc">
                        <button type="submit">
                            <div class="flex items-start justify-start">
                                <p class="font-medium text-gray-600 text-sm">Sort By Newest</p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        @else
                        <input type="hidden" name="sortby" value="asc">
                        <button type="submit">
                            <div class="flex items-start justify-start">
                                <p class="font-medium text-gray-600 text-sm">Sort By Oldest</p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        @endif

                    </form> -->
                </div>
                @if (count($data->comments) > 0)
                @for ($i = 0; $i < count($data->comments); $i++)
                    <div class="flex items-start">
                        <div>
                            <p class="bg-gray-600 h-10 w-10 rounded-full text-white flex items-center justify-center">{{ $data->comments[$i]->user->name[0] }}</p>
                        </div>
                        <div class="ml-2">
                            <div>
                                <p class="text-sm font-semibold text-gray-600 mb-1">{{ $data->comments[$i]->user->name}}</p>
                                <p class="text-xs text-gray-500">{{ $data->comments[$i]->comment}}</p>
                            </div>
                        </div>
                        <p class="font-thin text-xs text-gray-400 ml-auto pl-4"> {{$data->comments[$i]->created_at->diffForHumans()}}</p>
                    </div>
                    <hr class="my-4">
                    @endfor
                    @else
                    <p class="text-center text-gray-500">No comments yet</p>
                    @endif
            </div>
        </div>
    </div>
    </div>
</section>
@endif

@endforeach
@endsection
