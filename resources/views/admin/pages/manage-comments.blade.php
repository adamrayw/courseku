@extends('admin.layouts.admin')

@section('admin-title', 'Manage Users')

@section('admin-content')
<section class="mt-16 px-4 md:px-12 w-full ml-0 md:ml-64">
    <div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-gray-600">Menage Comments</h2>
        </div>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-auto h-96">
                <table class="w-full">
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-white bg-blue-500 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Comment</th>
                            <th class="px-4 py-3">IN</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($comments as $comment )
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <p>{{ $comment->comment }}</p>
                            </td>
                            <td class="px-4 py-3 border">
                                <a href="/course/{{ $comment->tutorial->slug }}">
                                    <p class="underline text-blue-600">{{ $comment->tutorial->name }}</p>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm border">{{$comment->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-3 text-sm border">
                                <div class="">
                                    <div class="mx-2"></div>
                                    <a href="" class="flex items-center text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" onclick="alert('Are you sure to delete?')" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</section>
@endsection