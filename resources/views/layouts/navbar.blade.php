<nav class="flex items-center bg-white shadow p-3 flex-wrap">
    <a href="/" class="p-2 mr-4 inline-flex items-center">
        <span class="text-xl text-blue-500 font-bold uppercase tracking-wide">COURSEKU</span>
    </a>
    <button class="text-gray-600 inline-flex p-3 hover:bg-gray-600 hover:text-white transition rounded-lg lg:hidden ml-auto outline-none nav-toggler" data-target="#navigation">
        <i class="fas fa-bars fa-lg"></i>
    </button>
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto">
            <a href="/" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-gray-400 items-center justify-center hover:text-gray-600 transition-all">
                <span>Home</span>
            </a>
            <a href="/programming" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-gray-400 items-center justify-center hover:text-gray-600 transition-all">
                <span>Programming</span>
            </a>
            <a href="/design" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-gray-400 items-center justify-center hover:text-gray-600 transition-all">
                <span>Design</span>
            </a>
            @if (Auth::check())
            <div x-data="{ dropdownOpen: false }" class="relative ml-auto">
                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                    <div class="flex justify-between items-center">
                        <p class="bg-gray-500 text-white p-4 h-5 w-5 rounded-md flex justify-center items-center">{{ Auth()->user()->name[0] }} </p>
                        <i class="fas fa-caret-down ml-2"></i>
                    </div>
                </button>
                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                    <p class="block px-4 py-2 text-sm capitalize text-gray-700">
                        Hi, {{ Auth()->user()->name }}
                    </p>
                    <hr class="mb-1">
                    <div>
                        <!-- Modal -->
                        <div x-data="{ showModal : false }">
                            <button @click="showModal = !showModal" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">
                                <i class="fas fa-paper-plane mr-1"></i> Submit a Tutorial
                            </button>
                            <!-- Modal Background -->
                            <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <!-- Modal -->
                                <div x-show="showModal" class="h-4/5 overflow-y-scroll bg-white rounded-md py-6 px-4 mx-4 w-full md:w-auto" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                    <!-- Title -->
                                    <div class="flex items-center mb-1 px-4">
                                        <i class="fas fa-paper-plane mr-1 fa-lg"></i>
                                        <span class="font-bold block text-2xl ml-2">Submit tutorial</span>
                                    </div>
                                    <hr class="mt-2">
                                    <!-- Body 🍺 -->
                                    <div class="p-4 md:w-auto w-full">
                                        <form action="/admin/add-tutorial" method="POST">
                                            @csrf

                                            <div class="my-4">
                                                <h2 class="text-gray-600 font-semibold mb-1">Tutorial name</h2>
                                                <input type="text" name="name" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="">
                                            </div>
                                            <div class="my-4">
                                                <h2 class="text-gray-600 font-semibold mb-1">Description</h2>
                                                <textarea type="text" name="description" class="border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Description" rows="4"></textarea>
                                            </div>
                                            <div class="my-4">
                                                <h2 class="text-gray-600 font-semibold mb-1">Author</h2>
                                                <input type="text" name="author" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Author of tutorial">
                                            </div>
                                            <div class="my-2 md:flex items-center justify-between">
                                                <div class="my-4">
                                                    <h2 class="text-gray-600 font-semibold mb-1">Type</h2>
                                                    <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="type">
                                                        <option value="Video">
                                                            Video
                                                        </option>
                                                        <option value="Article">
                                                            Article
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="my-4 md:mx-2">
                                                    <h2 class="text-gray-600 font-semibold mb-1">Level</h2>
                                                    <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="level">
                                                        <option value="Beginner">
                                                            Beginner
                                                        </option>
                                                        <option value="Advanced">
                                                            Advanced
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="my-4">
                                                    <h2 class="text-gray-600 font-semibold mb-1">Category</h2>
                                                    <select class="block w-52 text-gray-500 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="course_id">
                                                        @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}">
                                                            {{ $course->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="my-4">
                                                <h2 class="text-gray-600 font-semibold mb-1">Link</h2>
                                                <input type="text" name="source_link" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Source Link"></input>
                                            </div>
                                            <div class="mt-6 text-right">
                                                <a @click="showModal = !showModal" class="cursor-pointer bg-white border border-gray-200 px-6 py-2 text-gray-800 rounded-md hover:bg-gray-300 hover:text-white transition">Cancel</a>
                                                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-md hover:bg-gray-700 transition">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/profile" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                        <i class="fas fa-user mr-1"></i> My Profile
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm capitalize text-red-600 hover:bg-red-500 hover:text-white"><i class="fas fa-sign-out-alt mr-1"></i> Log Out</button>
                    </form>
                </div>
            </div>
            @else
            <a href="/register" class="lg:inline-flex text-center lg:w-auto w-full px-4 mt-2 md:mt-0 py-2 rounded text-white items-center justify-center bg-gray-700 hover:bg-gray-500 transition">
                <span>Sign Up</span>
            </a>
            @endif
        </div>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".nav-toggler").each(function(_, navToggler) {
            var target = $(navToggler).data("target");
            $(navToggler).on("click", function() {
                $(target).animate({
                    height: "toggle"
                });
            });
        });
    });
</script>
