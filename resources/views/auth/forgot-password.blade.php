@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<div class="my-20 mx-2 bg-white flex flex-col justify-center items-center">
    <div class="bg-white w-full md:w-1/4 shadow rounded-md p-5 mx-2">
        <h1 class="text-4xl font-bold mb-2 text-gray-600">Forgot Password</h1>
        <p class="text-sm text-gray-500">Cukup masukkan email terdaftar Anda, kami akan mengirimkan email berisi tautan untuk mereset kata sandi Anda.</p>
        <hr class="mt-2 mb-2">
        <div class="card-body">
            @if (session('status'))
            <div class="alert text-blue-600" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder=" Email">

                    @error('email')
                    <div class="alert text-red-500 mt-2">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <button type="submit" class="mt-2 text-center text-base w-full bg-blue-500 hover:bg-blue-700 transition rounded-md text-white py-3 font-medium hover:bg-gray-600 transition">SEND PASSWORD RESET LINK</button>
            </form>
        </div>
    </div>
</div>
@endsection
