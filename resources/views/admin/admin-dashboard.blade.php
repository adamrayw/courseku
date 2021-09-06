@extends('admin.layouts.admin')
@section('admin-content')
@section('admin-title', 'Admin Dashboard')


<section class="mt-20 px-4 md:px-12 w-full">
    <div class="mb-6">
        <h3 class="text-2xl md:text-4xl font-semibold text-gray-600">Hi, {{ Auth()->user()->name }}</h3>
        <hr class="mt-2">
    </div>
    <div class="total-user grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="card bg-white rounded-md py-4 px-6 shadow text-xl text-center">
            <p class="text-gray-600 font-medium text-2xl mb-2">10</p>
            <p class="text-blue-600 font-bold">Users</p>
        </div>
        <div class="card bg-white rounded-md py-4 px-6 shadow text-xl text-center">
            <p class="text-gray-600 font-medium text-2xl mb-2">10</p>
            <p class="text-blue-600 font-bold">Tutorials</p>
        </div>
        <div class="card bg-white rounded-md py-4 px-6 shadow text-xl text-center">
            <p class="text-gray-600 font-medium text-2xl mb-2">10</p>
            <p class="text-blue-600 font-bold">Courses</p>
        </div>
    </div>
    <div class="mt-4 grid md:grid-cols-3 gap-4">
        <div class="card md:col-span-2 bg-white rounded-md shadow p-4 text-gray-600">
            <h2>Tutorials active</h2>
        </div>
        <div class="card bg-white rounded-md shadow p-4 text-gray-600">
            <h2>New User</h2>
        </div>
    </div>
</section>
@endsection
