<div class="flex ml-auto">
    @foreach ($datas as $data)

        @php

            $like_status = 'far';
            $dislike = 'storevote';

        @endphp

        @foreach ($data->votes as $liked)
            @php

                if (Auth::check()) {
                    if ($liked->user_id == Auth::user()->id) {
                        $like_status = 'fas';
                        $dislike = 'removevote';
                    }
                }

            @endphp
        @endforeach

        @php
            $save_status = 'far';
            $saved = 'storesave';
        @endphp


        @foreach ($data->saves as $save)
            @php

                if (Auth::check()) {
                    if ($save->user_id == Auth::user()->id) {
                        $save_status = 'fas';
                        $saved = 'removesave';
                    }
                }
            @endphp
        @endforeach


        @if (Auth::check())

            {{-- default: action="/course/{{$data->slug}}/{{ $dislike }}" method="POST" --}}
            <form wire:submit.prevent="{{ $dislike }}">
                @csrf
                <input type="text" wire:model="tutorials_id" class="hidden" value="{{ $data->id }}">
                <input type="text" wire:model="users_id" class="hidden" value="{{ Auth()->user()->id }} ">
                <input type="text" wire:model="vote" class="hidden" value="1">
                <button type="submit" class="md:text-lg text-sm mr-2 text-gray-600"><i
                        class="{{ $like_status }} fa-thumbs-up md:text-2xl text-lg pr-1"></i>
                    {{ count($data->votes) }}</button>
            </form>
        @else
            <div x-data="{ showModal : false }">
                <button @click="showModal = !showModal" class="md:text-lg text-sm mr-2"><i
                        class="far fa-thumbs-up text-gray-600 md:text-2xl text-lg pr-1"></i>
                    {{ count($data->votes) }}</button>

                <div x-show=" showModal"
                    class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                    x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <!-- Modal -->
                    <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-full sm:w-5/12 mx-10"
                        @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease duration-100 transform"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                        <h1 class="text-center my-6 text-xl">Login to like, bookmark, and comment this tutorial.</h1>
                        <div class="text-center">
                            <button @click="showModal = !showModal"
                                class="px-4 py-2 text-sm  bg-gray-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-gray-700 focus:bg-indigo-50 focus:text-gray-200">Later</button>
                            <a href="/login"
                                class="px-4 py-2 text-sm bg-blue-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-blue-700 focus:bg-indigo-50 focus:text-gray-200">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::check())
            <form wire:submit.prevent="{{ $saved }}">
                <input type="text" wire:model="tutorials_id" class="hidden" value="{{ $data->id }}">
                <input type="text" wire:model="users_id" class="hidden" value="{{ Auth()->user()->id }} ">
                <input type="text" wire:model="save" class="hidden" value="1">
                <button type="submit" class="text-gray-600 text-lg  ml-4"><i
                        class="{{ $save_status }} fa-bookmark mr-1 md:text-2xl text-lg"></i></button>
            </form>
        @else
            <div x-data="{ showModal : false }">
                <button @click="showModal = !showModal" class="text-lg ml-4"><i
                        class="{{ $save_status }} fa-bookmark mr-1 text-gray-600 md:text-2xl text-lg"></i></button>

                <div x-show=" showModal"
                    class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                    x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <!-- Modal -->
                    <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-full sm:w-5/12 mx-10"
                        @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease duration-100 transform"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                        <h1 class="text-center my-6 text-xl">Login to like, bookmark, and comment this tutorial.</h1>
                        <div class="text-center">
                            <button @click="showModal = !showModal"
                                class="px-4 py-2 text-sm  bg-gray-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-gray-700 focus:bg-indigo-50 focus:text-gray-200">Later</button>
                            <a href="/login"
                                class="px-4 py-2 text-sm bg-blue-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-blue-700 focus:bg-indigo-50 focus:text-gray-200">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
