@extends('layouts.app')

@section('title', 'Submit Tutorial')

@section('content')
@if (session('success'))
<div class="mb-2 alert alert-success">
    <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
        <p class="font-bold">
            Success
        </p>
        <p>
            {{ session('success') }}
        </p>
    </div>
</div>
@endif
<section class="my-20 max-w-3xl mx-4 md:mx-auto">
    <div class="bg-white shadow rounded-md">
        <div class="flex items-center p-4 text-gray-600">
            <i class="fas fa-paper-plane mr-1 fa-lg"></i>
            <span class="font-bold block text-2xl ml-2">Submit tutorial</span>
        </div>
        <hr>
        <!-- Body 🍺 -->
        <div class="p-6 md:px-8 md:w-auto w-full">
            <form action="/submit-tutorial" method="POST">
                @csrf
                <input type="hidden" name="comment_id" value="0">
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <input type="hidden" name="submitted_by" value="{{ Auth()->user()->name }}">
                <input type="hidden" name="views" value="0">
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Tutorial name</h2>
                    <input type="text" name="name" class="h-12 border w-full font-xs text-gray-500 @error('name') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="ex: Javascript Dasar" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Description</h2>
                    <textarea type="text" name="description" class="border w-full font-xs text-gray-500 app @error('description') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Description" rows="4">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Author</h2>
                    <input type="text" name="author" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Author of tutorial" value="{{ old('author') }}">
                    @error('author')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2 md:flex items-center justify-between">
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Type</h2>
                        <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="type" required>
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
                        <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="level" required>
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
                        <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="course_id" required>
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
                    <input type="text" name="source_link" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Source Link" value="{{ old('source_link') }}"></input>
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
