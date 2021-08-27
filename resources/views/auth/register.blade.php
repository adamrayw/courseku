@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="my-20 mx-2 bg-white flex flex-col justify-center items-center">
    <div class="bg-white w-full md:w-1/4 shadow rounded-md p-5 mx-2">
        <h1 class="text-4xl font-bold mb-2 text-gray-600">Welcome to COURSEKU!</h1>
        <p class="text-sm text-gray-500">Signup to submit, like, comment and more!</p>
        <hr class="mt-2 mb-2">
        @if (session()->has('loginError'))
        <div class="bg-red-200 p-4 text-center rounded-md border-2 border-red-700">
            {{ session('loginError') }}
        </div>
        @endif
        <form action="{{ route('register') }}" method="POST" class="mt-2">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label class="font-weight-bold text-uppercase">Full Name</label> -->
                        <input type="text" name="name" value="{{ old('name') }}" class="h-12 border w-full font-xs text-gray-500 border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring-2 ring-blue-200" placeholder="Full Name">
                        @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label class="font-weight-bold text-uppercase">Email address</label> -->
                        <input type="email" name="email" value="{{ old('email') }}" class="h-12 border w-full font-xs text-gray-500 border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring-2 ring-blue-200" placeholder="Email">
                        @error('email')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label class="font-weight-bold text-uppercase">Password</label> -->
                        <input type="password" name="password" class="h-12 border w-full font-xs text-gray-500 border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring-2 ring-blue-200" placeholder="Password">
                        @error('password')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label class="font-weight-bold text-uppercase">Konfirmasi Password</label> -->
                        <input type="password" name="password_confirmation" class="h-12 border w-full font-xs text-gray-500 border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring-2 ring-blue-200" placeholder="Confirm Password">
                    </div>
                </div>

            </div>

            <button type="submit" class="mt-4 text-center w-full bg-gray-700 rounded-md text-white py-3 font-medium hover:bg-gray-600 transition">REGISTER</button>

            <p class="text-sm text-center my-4 text-gray-500">Already have an account ? <a href="/login" class="underline">Sign In</a></p>
        </form>
    </div>
</div>
</div>

@endsection