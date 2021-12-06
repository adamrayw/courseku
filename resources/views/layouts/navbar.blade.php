<nav class="flex items-center bg-white shadow p-3 flex-wrap">
    <a href="/" class="p-2 mr-4 inline-flex items-center">
        <span class="text-xl text-blue-500 font-bold uppercase tracking-wide">COURSEKU</span>
    </a>
    <button class="text-gray-600 inline-flex p-3 hover:bg-gray-600 hover:text-white transition rounded-lg lg:hidden ml-auto outline-none nav-toggler" data-target="#navigation">
        <i class="fas fa-bars fa-lg"></i>
    </button>
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto">
            <a href="/" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-gray-400 items-center justify-center hover:text-blue-500 transition-all">
                <span>Home</span>
            </a>
            <a href="/explore" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-gray-400 items-center justify-center hover:text-blue-500 transition-all">
                <span>Explore</span>
            </a>
            <a href="/programming" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-gray-400 items-center justify-center hover:text-blue-500 transition-all">
                <span>Programming</span>
            </a>
            <a href="/design" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-gray-400 items-center justify-center hover:text-blue-500 transition-all">
                <span>Design</span>
            </a>
            @if (Auth::check())
            <div x-data="{ dropdownOpen: false }" class="relative ml-auto">
                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                    <div class="flex justify-between items-center">
                        <p class="bg-blue-500 text-white p-4 h-5 w-5 rounded-md flex justify-center items-center">{{ Auth()->user()->name[0] }} </p>
                        <i class="fas fa-caret-down ml-2"></i>
                    </div>
                </button>
                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                    <p class="block px-4 py-2 text-sm capitalize text-blue-500 font-semibold">
                        Hi, {{ Auth()->user()->name }}
                    </p>
                    <hr class="mb-1">

                    <!-- SUBMIT TUTORiAL -->

                    <a href="/submit-tutorial" class="block text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">
                        <i class="fas fa-paper-plane mr-1"></i> Kirim Course
                    </a>

                    <a href="/profile" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                        <i class="fas fa-user mr-1"></i> Profil Saya
                    </a>

                    <a href="/edit-profile" class="block text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">
                        <i class="fas fa-edit mr-1"></i> Edit Profil
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm capitalize text-red-600 hover:bg-red-500 hover:text-white"><i class="fas fa-sign-out-alt mr-1"></i> Keluar</button>
                    </form>
                </div>
            </div>
            @else
            <a href="/register" class="lg:inline-flex text-center lg:w-auto w-full px-4 mt-2 md:mt-0 py-2 rounded text-white items-center justify-center bg-blue-500 hover:bg-blue-700 transition">
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
