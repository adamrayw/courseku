@extends('admin.layouts.admin')

@section('admin-title', 'Manage Tutorial')

@section('admin-content')
<section class="mt-16 px-4 md:px-12 w-full ml-0 md:ml-64">
    <div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-gray-600">Menage Tutorials</h2>
        </div>
        @if (session('successDelete'))
        <div class="mb-2 alert alert-success" x-data="{cookies: true}" x-show="cookies">
            <div class="bg-green-200 flex border-green-600 text-green-600 border-l-4 p-4" role="alert">
                <div>
                    <p class="font-bold">
                        Success
                    </p>
                    <p>
                        {{ session('successDelete') }}
                    </p>
                </div>
                <div class="ml-auto">
                    <p class="cursor-pointer" @click="cookies = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </p>
                </div>
            </div>
        </div>
        @endif
        @if (session('updateTutorialSuccess'))
        <div class="mb-2 alert alert-success" x-data="{cookies: true}" x-show="cookies">
            <div class="bg-green-200 flex border-green-600 text-green-600 border-l-4 p-4" role="alert">
                <div>

                    <p class="font-bold">
                        Success
                    </p>
                    <p>
                        {{ session('updateTutorialSuccess') }}
                    </p>
                </div>
                <div class="ml-auto">
                    <p class="cursor-pointer" @click="cookies = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </p>
                </div>
            </div>
        </div>
        @endif
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-auto h-96">
                <table class="w-full">
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-white bg-blue-500 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($tutorials as $tutorial )
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <p>{{ $tutorial->name }}</p>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight {{ ($tutorial->status == 'Release') ? 'text-green-700 bg-green-100' : 'text-gray-700 bg-gray-100' }}  rounded-sm"> {{ $tutorial->status }} </span>
                            </td>
                            <td class="px-4 py-3 text-sm border">{{$tutorial->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-3 text-sm border">
                                <div class="flex items-center">
                                    <!-- Modal -->
                                    <div x-data="{ showModal : false }">
                                        <button @click="showModal = !showModal" class="flex justify-center items-center text-green-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </button>

                                        <!-- Modal Background -->
                                        <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                            <!-- Modal -->
                                            <div x-show="showModal" class="bg-white h-96 overflow-y-scroll rounded-xl shadow-2xl p-6 w-auto mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                                <!-- Title -->
                                                <div class="flex items-center mb-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    <span class="font-bold block text-2xl ml-2">Edit Tutorial</span>
                                                </div>
                                                <!-- Body 🍺 -->
                                                <div class="p-4 md:w-96 w-full">
                                                    <form action="/admin/manage-tutorials/{{ $tutorial->id }}" method="POST">
                                                        @csrf
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Comment ID</h2>
                                                            <input type="text" name="commentid" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="CommentID" value="{{$tutorial->comment_id}}">
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Course</h2>
                                                            <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="course_id">
                                                                <option value="{{ $tutorial->course->id }}">
                                                                    {{ $tutorial->course->name }}
                                                                </option>
                                                                @foreach ($courses as $course)
                                                                <option value="{{ $course->id }}">
                                                                    {{ $course->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <p class="text-xs text-gray-500 mt-2">This tutorial in <span class="text-gray-500 font-bold">{{$tutorial->course->name}}</span> course</p>
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Tutorial Name</h2>
                                                            <input type="text" name="name" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Tutorial name" value="{{ $tutorial->name }}">
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Description (Optional)</h2>
                                                            <textarea type="text" name="description" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Description">{{ $tutorial->description }}</textarea>
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Author</h2>
                                                            <input type="text" name="author" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Author" value="{{ $tutorial->author }}">
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Type</h2>
                                                            <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="type">
                                                                <option value="{{ $tutorial->type }}">
                                                                    {{ $tutorial->type }}
                                                                </option>
                                                                <option value="Video">
                                                                    Video
                                                                </option>
                                                                <option value="Article">
                                                                    Article
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Level</h2>
                                                            <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="level">
                                                                <option value=" {{ $tutorial->level }}">
                                                                    {{ $tutorial->level }}
                                                                </option>
                                                                <option value="beginner">
                                                                    Beginner
                                                                </option>
                                                                <option value="advanced">
                                                                    Advanced
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Level</h2>
                                                            <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="status">
                                                                <option value=" {{ $tutorial->status }}">
                                                                    {{ $tutorial->status }}
                                                                </option>
                                                                <option value="Release">
                                                                    Release
                                                                </option>
                                                                <option value="Draft">
                                                                    Draft
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Submitted By</h2>
                                                            <input type="text" name="submitted_by" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Submitted By" value=" {{ $tutorial->submitted_by }}">
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Link</h2>
                                                            <input type="text" name="source_link" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Source Link" value=" {{ $tutorial->source_link }}">
                                                        </div>
                                                        <!-- Buttons -->
                                                        <div class="text-right space-x-2 mt-5">
                                                            <a @click="showModal = !showModal" class="cursor-pointer px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Cancel</a>
                                                            <button type="submit" class="px-4 py-2 text-sm bg-gray-800 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-white hover:bg-gray-600">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mx-2"></div>
                                    <a href="/admin/manage-tutorials/{{$tutorial->id}}" onclick="confirm('Are you sure to delete?')" class="flex justify-center items-center text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </a>
                                </div>
                            </td>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</section>
@endsection
