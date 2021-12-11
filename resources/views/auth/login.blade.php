@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="my-20 mx-2 flex flex-col justify-center items-center">
    <div class="bg-white w-full md:w-1/4 shadow rounded-md p-6 mx-2">
        <h1 class="text-4xl font-bold mb-2 text-gray-600">Login</h1>
        <p class="text-sm text-gray-500">Ingin belajar hal baru?</p>
        <hr class="mt-2 mb-2">
        @if (session('status'))
        <div class=" alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST" class="mt-2">
            @csrf
            <input type="email" name="email" class="h-12 border border-transparent rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition w-full font-xs text-gray-500 app @error('email') border-red-300 @enderror border-gray-300 p-2 mt-4 rounded-md focus:outline-none" placeholder="Email" value="{{ old('email')}}" />
            @error('email')
            <p class="mt-1 text-red-600 text-sm font-light transition">{{ $message }}</p>
            @enderror

            <input type="password" name="password" class="h-12 border border-transparent rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition w-full font-xs text-gray-500 app @error('email') border-red-300 @enderror border-gray-300 p-2 mt-4 rounded-md focus:outline-none" id="pass" placeholder="Password" />
            @error('password')
            <p class="mt-1 text-red-600  text-sm font-light transition">{{ $message }}</p>
            @enderror

            <div class="mt-6">
                <a href="/forgot-password" class="font-medium text-sm text-gray-500 float-right">Lupa Password?</a>
            </div>
            <button type="submit" class="mt-2 text-center w-full bg-blue-500 rounded-md text-white py-3 font-medium hover:bg-blue-700 transition">Login</button>
            <p class="text-sm text-center mt-6 text-gray-500">Belum memiliki akun? <a href="/register" class="underline">Register</a></p>
        </form>
    </div>
</div>

@endsection
