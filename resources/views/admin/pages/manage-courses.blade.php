@extends('admin.layouts.admin')

@section('admin-title', 'Manage Users')

@section('admin-content')
<section class="mt-12 mb-20 px-4 md:px-12 w-full ml-0 md:ml-64">
    <div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-gray-600">Menage Courses</h2>
        </div>
        @if (session('updateCourseSuccess'))
        <div class="mb-2 alert alert-success" x-data="{cookies: true}" x-show="cookies">
            <div class="bg-green-200 flex border-green-600 text-green-600 border-l-4 p-4" role="alert">
                <div>
                    <p class="font-bold">
                        Success
                    </p>
                    <p>
                        {{ session('updateCourseSuccess') }}
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
            <div class="w-full overflow-x-auto bg-white h-96">
                <table class="w-full">
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-white bg-blue-500 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date Added</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($courses as $course )
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                        {!! $course->img_url !!}
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-600">{{ $course->name }}</p>
                                        <p class="text-xs text-gray-600">{{ $course->category->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight {{ ($course->status == 'Release') ? 'text-green-700 bg-green-100' : 'text-gray-700 bg-gray-100' }} rounded-sm"> {{ $course->status }} </span>
                            </td>
                            <td class="px-4 py-3 text-sm border">{{$course->created_at }}</td>
                            <td class="px-4 py-3 text-sm border">
                                <div class="flex items-center">
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
                                                <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-auto mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                                    <!-- Title -->
                                                    <div class="flex items-center mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                        <span class="font-bold block text-2xl ml-2">Edit Course</span>
                                                    </div>
                                                    <!-- Body 🍺 -->
                                                    <div class="p-4 md:w-96 w-full">
                                                        <form action="/admin/manage-courses/course" method="POST">
                                                            @csrf
                                                            <div class="mb-4">
                                                                <h2 class="text-gray-600 font-semibold mb-1">Icon</h2>
                                                                <input type="text" name="img_url" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Paste icon url here" value="{{ $course->img_url }}">
                                                                <p class="text-xs text-gray-400 mt-1 font-light">We recommended from <a class="underline" href="https://icons8.com/">icons8</a></p>
                                                            </div>
                                                            <div class="my-4">
                                                                <h2 class="text-gray-600 font-semibold mb-1">Course Name</h2>
                                                                <input type="text" name="name" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Course name" value="{{ $course->name }}">
                                                            </div>
                                                            <div class="my-4">
                                                                <h2 class="text-gray-600 font-semibold mb-1">Slug</h2>
                                                                <input type="text" name="slug" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Slug" value="{{ $course->slug }}">
                                                            </div>
                                                            <div class="my-4">
                                                                <h2 class="text-gray-600 font-semibold mb-1">Status</h2>
                                                                <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="status">
                                                                    <option value="{{ $course->status }}">
                                                                        {{ $course->status }}
                                                                    </option>
                                                                    <option value="Draft">
                                                                        Draft
                                                                    </option>
                                                                    <option value="Release">
                                                                        Release
                                                                    </option>
                                                                </select>
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
                                        <a href="/admin/manage-courses/{{$course->id}}" onclick="confirm('Are you sure to delete?')" class="flex justify-center items-center text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Delete
                                        </a>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-gray-600">Menage Categories</h2>
        </div>
        @if (session('updateSuccess'))
        <div class="mb-2 alert alert-success" x-data="{cookies: true}" x-show="cookies">
            <div class="bg-green-200 flex border-green-600 text-green-600 border-l-4 p-4" role="alert">
                <div>
                    <p class="font-bold">
                        Success
                    </p>
                    <p>
                        {{ session('updateSuccess') }}
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
            <div class="w-full overflow-x-auto bg-white h-60">
                <table class="w-full">
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-white bg-blue-500 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date Added</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($categories as $category )
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                        <img src="{{ $category->img_url }}" alt="logo_courses">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-600">{{ $category->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight {{ ($category->status == 'Release') ? 'text-green-700 bg-green-100' : 'text-gray-700 bg-gray-100' }}  rounded-sm"> {{ $category->status }} </span>
                            </td>
                            <td class="px-4 py-3 text-sm border">{{$category->created_at }}</td>
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
                                            <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-auto mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                                <!-- Title -->
                                                <div class="flex items-center mb-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    <span class="font-bold block text-2xl ml-2">Edit Category</span>
                                                </div>
                                                <!-- Body 🍺 -->
                                                <div class="p-4 md:w-96 w-full">
                                                    <form action="/admin/manage-courses/category" method="POST">
                                                        @csrf
                                                        <div class="mb-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Icon</h2>
                                                            <input type="text" name="img_url" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Paste icon url here" value="{{ $category->img_url }}">
                                                            <p class="text-xs text-gray-400 mt-1 font-light">We recommended from <a class="underline" href="https://icons8.com/">icons8</a></p>
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Category Name</h2>
                                                            <input type="text" name="name" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Course name" value="{{ $category->name }}">
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Slug</h2>
                                                            <input type="text" name="slug" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Slug" value="{{ $category->slug }}">
                                                        </div>
                                                        <div class="my-4">
                                                            <h2 class="text-gray-600 font-semibold mb-1">Status</h2>
                                                            <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="status">
                                                                <option value="{{ $category->status }}">
                                                                    {{ $category->status }}
                                                                </option>
                                                                <option value="Draft">
                                                                    Draft
                                                                </option>
                                                                <option value="Release">
                                                                    Release
                                                                </option>
                                                            </select>
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
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</section>
@endsection
