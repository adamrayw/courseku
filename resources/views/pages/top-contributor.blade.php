@extends('layouts.app')

@section('title', 'Top Contributor')

@section('content')

    <section class="my-20 max-w-3xl mx-4 md:mx-auto">
        <div class="bg-white shadow rounded-md">
            <div class="flex flex-col items-start p-4 text-gray-600">
                <span class="font-bold block text-2xl ml-2"><i class="fas fa-medal mr-2 fa-md"></i>Top 5 Contributor</span>
            </div>
            <hr>
            <!-- Body 🍺 -->
            <div class="p-6 md:px-8 md:w-auto w-full">
                <table class="w-full">
                    <thead>
                        <tr class="font-semibold">
                            <td>No</td>
                            <td>Nama</td>
                            <td>Points</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-gray-500">
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->points }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
