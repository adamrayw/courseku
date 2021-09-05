@extends('admin.layouts.admin')
@section('admin-content')
@section('admin-title', 'Admin Dashboard')


<section class="max-w-7xl mx-auto mt-20">
    <h3 class="text-2xl font-semibold">Welcome, {{ Auth()->user()->name }}</h3>
</section>
@endsection
