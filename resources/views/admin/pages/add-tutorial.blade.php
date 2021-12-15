@extends('admin.layouts.admin')

@section('admin-title', 'Add Tutorial')

@section('admin-content')
    <section class="mt-16 px-4 md:px-12 ml-0 md:ml-64">
        <div>
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-600">Add New Tutorial</h2>
            </div>
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

            <div class="bg-white shadow-md rounded-md p-4 md:w-96 w-full">
                <form action="/admin/add-tutorial" method="POST">
                    @csrf
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Comment ID</h2>
                        <input type="text" name="commentid"
                            class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                            placeholder="CommentID" value="0">
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Course</h2>
                        <select
                            class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Name</h2>
                        <input type="text" name="name"
                            class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                            placeholder="Full name">
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Description (Optional)</h2>
                        <textarea type="text" name="description"
                            class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                            placeholder="Description"></textarea>
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Author</h2>
                        <input type="text" name="author"
                            class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                            placeholder="Author">
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Type</h2>
                        <select
                            class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            name="type">
                            <option value="Video">
                                Video
                            </option>
                            <option value="Artikel">
                                Artikel
                            </option>
                        </select>
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Level</h2>
                        <select
                            class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            name="level">
                            <option value="Beginner">
                                Beginner
                            </option>
                            <option value="Advanced">
                                Advanced
                            </option>
                        </select>
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Submitted By</h2>
                        <input type="text" name="submitted_by"
                            class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                            placeholder="Submitted By"></input>
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Link</h2>
                        <input type="text" name="source_link"
                            class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                            placeholder="Source Link"></input>
                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="bg-gray-800 text-white px-6 py-2 rounded-md hover:bg-gray-700 transition">Submit</button>
                    </div>
                </form>
            </div>
    </section>
@endsection
