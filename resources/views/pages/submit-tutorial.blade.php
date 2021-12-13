@extends('layouts.app')

@section('title', 'Kirim Course')

@section('content')
    @if (session('success'))
        <div class="mb-2 alert alert-success">
            <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
                <p class="font-bold">
                    Success
                </p>
                <p>
                    {{ session('success') }}
                </p>
            </div>
        </div>
    @endif
    <section class="my-20 max-w-3xl mx-4 md:mx-auto">
        <div class="bg-white shadow rounded-md">
            <div class="flex items-center p-4 text-gray-600">
                <i class="fas fa-paper-plane mr-1 fa-lg"></i>
                <span class="font-bold block text-2xl ml-2">Kirim Course</span>
            </div>
            <hr class="text-gray-300">
            <!-- Body 🍺 -->
            <div class="p-6 md:px-8 md:w-auto w-full">
                <form action="/submit-tutorial" method="POST">
                    @csrf
                    <input type="hidden" name="comment_id" value="0">
                    <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                    <input type="hidden" name="submitted_by" value="{{ Auth()->user()->name }}">
                    <input type="hidden" name="views" value="0">
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Nama Course</h2>
                        <input type="text" name="name"
                            class="h-12 border w-full font-xs text-gray-500 @error('name') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 transition"
                            placeholder="cth: Javascript Dasar" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Deskripsi</h2>
                        <textarea type="text" name="description"
                            class="border w-full font-xs text-gray-500 app @error('description') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 transition"
                            placeholder="Deskripsi" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold mb-1">Author</h2>
                        <input type="text" name="author"
                            class="h-12 border w-full font-xs text-gray-500 app @error('description') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 transition"
                            placeholder="Author" value="{{ old('author') }}">
                        @error('author')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-2 md:flex items-center justify-between">
                        <div class="my-4">
                            <h2 class="text-gray-600 font-semibold mb-1">Type</h2>
                            <select
                                class="block w-52 text-gray-500 py-2 px-3 border @error('description') border-red-300 @enderror border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="type" required>
                                <option>
                                    Pilih type
                                </option>
                                <option value="Video">
                                    Video
                                </option>
                                <option value="Artikel">
                                    Artikel
                                </option>
                            </select>
                            @error('type')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-4 md:mx-2">
                            <h2 class="text-gray-600 font-semibold mb-1">Level</h2>
                            <select
                                class="block w-52 text-gray-500 py-2 px-3 border @error('description') border-red-300 @enderror border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="level" required>
                                <option>
                                    Pilih level
                                </option>
                                <option value="Beginner">
                                    Beginner
                                </option>
                                <option value="Advanced">
                                    Advanced
                                </option>
                            </select>
                            @error('level')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-4">
                            <h2 class="text-gray-600 font-semibold mb-1">Category</h2>
                            <select
                                class="block w-52 text-gray-500 py-2 px-3 border @error('description') border-red-300 @enderror border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="course_id" required>
                                <option>
                                    Pilih category
                                </option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="my-4">
                        <h2 class="text-gray-600 font-semibold">Link</h2>
                        <p class="text-gray-400 font-light mb-1 text-xs">Link dapat mengandung afiliasi.</p>
                        <input type="text" name="source_link"
                            class="h-12 border w-full font-xs text-gray-500 app @error('description') border-red-300 @enderror border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 transition"
                            placeholder="Link Sumber" value="{{ old('source_link') }}"></input>
                        @error('source_link')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <p class="text-gray-400 font-light mb-1 text-xs">Dengan mengklik submit kamu sudah berkontribusi, dan
                        mendapatkan 100 Points!</p>
                    <div class="mt-8 flex justify-between items-center">
                        <div x-data="{ showModal : false }">
                            <a @click="showModal = !showModal" class="text-lg mr-2 text-gray-600"><i
                                    class="fas fa-question-circle fa-lg"></i></a>

                            <div x-show=" showModal"
                                class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <!-- Modal -->
                                <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-full sm:w-5/12 mx-10"
                                    @click.away="showModal = false"
                                    x-transition:enter="transition ease duration-100 transform"
                                    x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                    x-transition:leave="transition ease duration-100 transform"
                                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                    <h1 class="text-2xl font-semibold">Peraturan</h1>
                                    <hr class="mb-6 text-gray-300">
                                    <ul class="list-decimal pl-4">
                                        <li>
                                            <p class="leading-relaxed">Nama course harus jelas.</p>
                                        </li>
                                        <li>
                                            <p class="leading-relaxed">Deskripsi harus sesuai dengan course yang dikirimkan.
                                            </p>
                                        </li>
                                        <li>
                                            <p class="leading-relaxed">Author adalah penulis atau creator video dari course
                                                tersebut.</p>
                                        </li>
                                        <li>
                                            <p class="leading-relaxed">Pilih type, misal kalian dapat course tersebut dari
                                                youtube pilih type Video.</p>
                                        </li>
                                        <li>
                                            <p class="leading-relaxed">Pilih level, sesuaikan dengan course.</p>
                                        </li>
                                        <li>
                                            <p class="leading-relaxed">Pilih category, sesuaikan dengan course.</p>
                                        </li>
                                        <li>
                                            <p class="leading-relaxed">Link sumber harus link asli, link tidak boleh
                                                diperpendek atau di shortlink, link boleh mengandung afiliasi.</p>
                                        </li>
                                    </ul>
                                    <p class="mt-2 text-red-500">Kami berhak mengubah/menghapus jika terdapat bagian yang
                                        tidak sesuai!</p>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
