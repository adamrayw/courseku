@extends('admin.layouts.admin')

@section('admin-title', 'Add Category')

@section('admin-content')
<section class="mt-16 px-4 md:px-12">
    <div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-gray-600">Add New Category</h2>
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
            <form action="/admin/add-category/post" method="POST">
                @csrf
                <div class="mb-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Icon</h2>
                    <input type="text" name="img_url" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Paste icon url here">
                    <p class="text-xs text-gray-400 mt-1 font-light">We recommended from <a class="underline" href="https://icons8.com/">icons8</a></p>
                </div>
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Category Name</h2>
                    <input type="text" name="name" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Category name">
                </div>
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Slug</h2>
                    <input type="text" name="slug" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Slug">
                </div>
                <div class="mt-6">
                    <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-md hover:bg-gray-700 transition">Submit</button>
                </div>
            </form>
        </div>

</section>
@endsection
