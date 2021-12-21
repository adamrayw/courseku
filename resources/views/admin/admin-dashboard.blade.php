@extends('admin.layouts.admin')
@section('admin-content')
@section('admin-title', 'Admin Dashboard')

<section class="mt-12 px-4 md:px-12 w-full ml-0 md:ml-64">
    <div class="total-user grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="card bg-white rounded-md py-4 px-6 shadow text-xl text-center">
            <p class="text-gray-600 font-medium text-2xl mb-2">{{ count($users_all) }}</p>
            <p class="text-blue-600 font-bold">Users</p>
        </div>

        <div class="card bg-white rounded-md py-4 px-6 shadow text-xl text-center">
            <p class="text-gray-600 font-medium text-2xl mb-2">{{ count($tutorials) }}</p>
            <p class="text-blue-600 font-bold">Tutorials</p>
        </div>
        <div class="card bg-white rounded-md py-4 px-6 shadow text-xl text-center">
            <p class="text-gray-600 font-medium text-2xl mb-2">{{ count($courses) }}</p>
            <p class="text-blue-600 font-bold">Courses</p>
        </div>
    </div>

    <!-- View active course & new user -->
    <div class="mt-4 grid md:grid-cols-3 gap-4">
        <div class="card md:col-span-2 bg-white rounded-md shadow p-6 text-gray-600">
            <h2 class="font-bold mb-2 text-xl">Tutorials active</h2>
            <div class="overflow-auto h-48 w-full">
                <table class="table-auto border-collapse border border-gray-400 relative">
                    <thead>
                        <tr class="text-left sticky top-0 bg-white">
                            <th class="w-1/2 border border-gray-400 p-2">Title</th>
                            <th class="w-1/4 border border-gray-400 p-2">Author</th>
                            <th class="w-1/4 border border-gray-400 p-2">Views</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tutorials as $tutorial)
                            <tr>

                                <td class="border border-gray-400 p-2"><a
                                        href="/course/{{ $tutorial->slug }}">{{ $tutorial->name }}</a></td>
                                <td class="border border-gray-400 p-2">{{ $tutorial->author }}</td>
                                <td class="border border-gray-400 p-2">{{ $tutorial->views }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card bg-white rounded-md shadow p-6 text-gray-600">
            <h2 class="font-bold text-xl">5 New User</h2>
            <hr class="my-2">
            <table class="table-auto w-full">
                <thead>
                    <tr class="text-left">
                        <th class="pb-2">No</th>
                        <th class="pb-2">Name</th>
                        <th class="pb-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="pb-2">{{ $loop->iteration }}.</td>
                            <td class="pb-2">{{ $user->name }}</td>
                            <td class="pb-2 text-right text-sm text-gray-400">{{ $user->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Comment -->
    <div class="mt-4 grid md:grid-cols-3 gap-4">
        <div class="card md:col-span-2 bg-white rounded-md shadow p-6 text-gray-600">
            <h2 class="font-bold mb-2 text-xl">Latest Comments</h2>
            <div class="overflow-auto h-44 w-full">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="text-left">
                            <th class="pb-2">No</th>
                            <th class="pb-2">comment</th>
                            <th class="pb-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td class="pb-2">{{ $loop->iteration }}.</td>
                                <td class="pb-2">{{ $comment->comment }} <a class="text-xs text-gray-400"
                                        href="/course/{{ $comment->tutorial->slug }}">In
                                        {{ $comment->tutorial->name }}</a></td>
                                <td class="pb-2 text-right text-sm text-gray-400">
                                    {{ $comment->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card bg-white rounded-md shadow p-4 text-gray-600">
            <h2 class="font-bold text-xl">App Version</h2>
            <hr class="my-2">
            <p class="mb-6">Versi saat ini :
                {{ $appversion[0]->version }}
            </p>

            <form action="/admin/updateversion" method="post">
                @csrf
                <div class="mb-2">
                    <input type="text" class=" px-2 py-1 border border-gray-400 rounded-lg" name="newversion"
                        id="newversion" placeholder="Ketik versi baru">
                </div>
                <button class="bg-blue-500 px-6 py-2 text-sm text-white rounded-lg hover:bg-blue-700 transition"
                    type="submit">Update</button>
            </form>
        </div>
    </div>
</section>
@endsection
