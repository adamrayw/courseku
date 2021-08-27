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


    <div class="view-tutorial flex-row justify-center mb-20">
        <img class="rounded-t-md" src="https://source.unsplash.com/700x200?coding" alt="img-card">
        <div class="p-4 shadow-md rounded-b-md text-left">
            <div>
                <h2 class="font-bold text-lg text-gray-600">{{ $data->name }}</h2>
            </div>
            <div class="creator mt-1 mb-4">
                <p class="text-sm text-gray-500">Creator : {{ $data->author }}</p>
            </div>
            <div class="flex items-center mt-2">
                <p class="text-xs rounded-md bg-blue-600 text-white p-2">{{ $data->type }}</p>
                <p class="text-xs rounded-md ml-2 bg-blue-600 text-white p-2">{{ $data->level }}</p>
                @if (Auth::check())
                @livewire('like-save', ['datas' => $datas, 'users_id' => Auth()->user()->id, 'tutorials_id' => $data->id, 'vote' => 1])
                @else
                @livewire('like-save', ['datas' => $datas, 'users_id' => 0, 'tutorials_id' => $data->id, 'vote' => 1])
                @endif
            </div>
            <div class=" description my-4">
                @if($data->type == ' Video') <h2 class="text-lg font-semibold mb-2 text-gray-600">Description</h2>
                @endif
                <p class="text-sm text-gray-500 text-justify">{{ $data->description }}</p>
            </div>
            <hr class="mb-4">
            <a class="block bg-gray-600 px-4 py-2 rounded-md text-center text-white hover:bg-gray-500 transition" href="{{ $data->source_link }}">Start Learning!</a>
        </div>
        <div class="comments-section text-left my-6">
            <div class="rounded-md">
                <div class="bg-white p-2">
                    <div class="">
                        <!-- Modal -->
                        <div x-data="{ showModal : false }">
                            <!-- Button -->
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="font-bold text-gray-600">{{ count($data->comments) }} Comments </h2>
                                <button @click="showModal = !showModal" class="text-sm max-w-3xl rounded-xl transition-colors duration-150 ease-linear text-gray-500 focus:outline-none focus:ring-0 font-bold hover:text-gray-700">Leave a comment</button>
                            </div>

                            <!-- Modal Background -->
                            <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <!-- Modal -->
                                <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-full sm:w-5/12 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                    @if (Auth::check())
                                    <!-- Title -->
                                    <span class="font-bold block text-2xl mb-1">Comment</span>
                                    <span class="font-thin text-xs block mb-3">What do you think about the course/article above?</span>
                                    <!-- Some beer 🍺 -->
                                    <div class="mt-2">
                                        <form action="/course/{{$data->slug}}/comment" method="POST">
                                            @csrf
                                            <input type="text" name="tutorials_id" class="hidden" value="{{ $data->id }}">
                                            <input type="text" name="users_id" class="hidden" value="{{ Auth()->user()->id }}">
                                            <textarea class="border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring-2 ring-blue-200" cols="20" name="comment" placeholder="Write your comment here"></textarea>
                                            <!-- Buttons -->
                                            <div class="text-right space-x-5 mt-5">
                                                <a href="#!" @click="showModal = !showModal" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">
                                                    @if(Auth::check())
                                                    Cancel
                                                    @else
                                                    Oke
                                                    @endif
                                                </a>
                                                @if (Auth::check())
                                                <button type="submit" class="px-4 py-2 text-sm bg-blue-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-bold hover:bg-blue-700 focus:bg-indigo-50 focus:text-gray-200">Post</button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                    @else
                                    <h1 class="text-center my-6 text-xl">Login to like, save, and comment this tutorial.</h1>
                                    <div class="text-center">
                                        <button @click="showModal = !showModal" class="px-4 py-2 text-sm  bg-gray-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-gray-700 focus:bg-indigo-50 focus:text-gray-200">Later</button>
                                        <a href="/login" class="px-4 py-2 text-sm bg-blue-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-blue-700 focus:bg-indigo-50 focus:text-gray-200">Login</a>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($data->comments) > 0)
                    @for ($i = 0; $i < count($data->comments); $i++)
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-600 mb-1">{{ $data->comments[$i]->user->name}}</p>
                            <p class="font-thin text-xs text-gray-400"> {{$data->comments[$i]->created_at->diffForHumans()}}</p>
                        </div>
                        <p class="mb-2 text-xs text-gray-500">{{ $data->comments[$i]->comment}}</p>
                        <hr class="mb-4">
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
