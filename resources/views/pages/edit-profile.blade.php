@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

<section class="my-20 max-w-xl mx-4 md:mx-auto">
    <div class="bg-white shadow rounded-md">
        <div class="flex items-center p-4 text-gray-600">
            <i class="fas fa-edit mr-1 fa-lg"></i>
            <span class="font-bold block text-2xl ml-2">Edit Profile</span>
        </div>
        <hr>
        <!-- Body 🍺 -->
        <div class="p-6 md:px-8 md:w-auto w-full">
            <form action="/edit-profile" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ Auth()->user()->id }}">
                @foreach ($users as $user)
                <div class="mb-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Full Name</h2>
                    <input type="text" name="name" class="h-12 border w-full font-xs text-gray-500 @error('name') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Full Name" value="{{ $user->name }}">
                    @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-4">
                    <h2 class="text-gray-600 font-semibold mb-1">Email</h2>
                    <input type="email" name="email" class="h-12 border w-full font-xs text-gray-500 app @error('email') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Your Email" value="{{ $user->email }}">
                    @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6 text-right">
                    <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-md hover:bg-gray-700 transition">Update</button>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</section>
@endsection
