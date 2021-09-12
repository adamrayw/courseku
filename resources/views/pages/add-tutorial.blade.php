@extends('layouts.app')

@section('title', 'Add Tutorial')

@section('content')
<section class="my-20 max-w-3xl mx-4 md:mx-auto">

    <div class="bg-white shadow rounded-md">
        <div class="flex items-center p-4 text-gray-600">
            <i class="fas fa-paper-plane mr-1 fa-lg"></i>
            <span class="font-bold block text-2xl ml-2">Submit tutorial</span>
        </div>
        <hr>
        <!-- Body 🍺 -->
        <div class="p-4 md:w-auto w-full">
            <form action="/profile/add-tutorial" method="POST">
                @csrf
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Tutorial name</h2>
                    <input type="text" name="name" class="h-12 border w-full font-xs text-gray-500 @error('name') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="ex: Javascript Dasar">
                    @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Description</h2>
                    <textarea type="text" name="description" class="border w-full font-xs text-gray-500 app @error('description') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Description" rows="4"></textarea>
                    @error('description')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Author</h2>
                    <input type="text" name="author" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Author of tutorial">
                    @error('author')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2 md:flex items-center justify-between">
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Type</h2>
                        <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="type">
                            <option>
                                Choose type
                            </option>
                            <option value="Video">
                                Video
                            </option>
                            <option value="Article">
                                Article
                            </option>
                        </select>
                        @error('type')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-4 md:mx-2">
                        <h2 class="text-gray-600 font-semibold mb-1">Level</h2>
                        <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="level">
                            <option>
                                Choose level
                            </option>
                            <option value="Beginner">
                                Beginner
                            </option>
                            <option value="Advanced">
                                Advanced
                            </option>
                        </select>
                        @error('level')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Category</h2>
                        <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="category">
                            <option>
                                Choose category
                            </option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}">
                                {{ $course->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Link</h2>
                    <input type="text" name="source_link" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Source Link"></input>
                    @error('source_link')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6 text-right">
                    <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-md hover:bg-gray-700 transition">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
