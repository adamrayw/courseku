@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="my-20 mx-2 bg-white flex flex-col justify-center items-center">
    <div class="bg-white w-full md:w-1/4 shadow rounded-md p-5 mx-2">
        <h1 class="text-4xl font-bold mb-2 text-gray-600">Reset Password</h1>
        <hr class="mb-2">
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <input id="email" type="email" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" name="email" value="{{ $request->email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Alamat Elamil">
                    @error('email')
                    <div class="alert alert-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" name="password" required autocomplete="new-password" placeholder="Masukkan Password Baru">
                    @error('password')
                    <div class="alert alert-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" name="password_confirmation" required autocomplete="new-password" placeholder="Masukkan Konfirmasi Password Baru">
                </div>

                <button type="submit" class="mt-2 text-center text-base w-full bg-blue-500 hover:bg-blue-700 transition rounded-md text-white py-3 font-medium hover:bg-gray-600 transition">RESET PASSWORD</button>
            </form>

        </div>
    </div>
</div>
@endsection
