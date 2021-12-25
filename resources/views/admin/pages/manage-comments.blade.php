@extends('admin.layouts.admin')

@section('admin-title', 'Manage Comments')

@section('admin-content')
    <section class="mt-16 px-4 md:px-12 w-full ml-0 md:ml-64">
        <div>
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-600">Menage Comments</h2>
            </div>
            @if (session('successDelete'))
                <div class="mb-2 alert alert-success" x-data="{cookies: true}" x-show="cookies">
                    <div class="bg-green-200 flex border-green-600 text-green-600 border-l-4 p-4" role="alert">
                        <div>
                            <p class="font-bold">
                                Success
                            </p>
                            <p>
                                {{ session('successDelete') }}
                            </p>
                        </div>
                        <div class="ml-auto">
                            <p class="cursor-pointer" @click="cookies = false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="w-full mb-8 overflow-hidden rounded-lg bg-white shadow-lg">
                <div class="w-full overflow-auto h-96">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-white bg-blue-500 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Comment</th>
                                <th class="px-4 py-3">IN</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($comments as $comment)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <p>{{ $comment->comment }}</p>
                                    </td>
                                    <td class="px-4 py-3 border">
                                        <a href="/course/{{ $comment->tutorial->slug }}">
                                            <p class="underline text-blue-600">{{ $comment->tutorial->name }}</p>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-sm border">{{ $comment->created_at->diffForHumans() }}</td>
                                    <td class="px-4 py-3 text-sm border">
                                        <div class="">

                                            <div x-data="{ showModal : false }" x-cloak>
                                                <button
                                                    class="mx-1 text-white bg-red-500 px-4 py-2 rounded-lg hover:bg-red-700 transition"
                                                    @click="showModal = !showModal">Hapus
                                                    Komentar</button>
                                                <div x-show=" showModal"
                                                    class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                                    x-transition:enter="transition ease duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="transition ease duration-300"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0">
                                                    <!-- Modal -->
                                                    <div x-show="showModal"
                                                        class="bg-white rounded-xl shadow-2xl px-6 pb-6 w-full sm:w-5/12 mx-4"
                                                        @click.away="showModal = false"
                                                        x-transition:enter="transition ease duration-100 transform"
                                                        x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                                                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                                        x-transition:leave="transition ease duration-100 transform"
                                                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                                        x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                                        <h1 class="text-center mt-6 mb-2 font-bold text-xl">Apakah kamu
                                                            yakin ingin
                                                            menghapusnya?</h1>
                                                        <div class="flex justify-center items-center mt-6">
                                                            <button @click="showModal = !showModal"
                                                                class="px-4 py-2 text-sm mx-1 bg-gray-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-gray-700 focus:bg-indigo-50 focus:text-gray-200">Batal</button>
                                                            <form action="/admin/manage-comments" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $comment->id }}">
                                                                <button
                                                                    class="px-4 py-2 text-sm mx-1 bg-red-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-red-700 focus:bg-indigo-50 focus:text-gray-200">Ya,
                                                                    yakin</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
