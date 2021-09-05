<nav class="flex items-center bg-white shadow p-3 flex-wrap">
    <a href="/" class="p-2 mr-4 inline-flex items-center">
        <span class="text-xl text-blue-500 font-bold uppercase tracking-wide">Admin</span>
    </a>
    <button class="text-gray-600 inline-flex p-3 hover:bg-gray-600 hover:text-white transition rounded-lg lg:hidden ml-auto outline-none nav-toggler" data-target="#navigation">
        <i class="fas fa-bars fa-lg"></i>
    </button>
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto">
            @guest('admin')
            <a href="/register" class="lg:inline-flex text-center lg:w-auto w-full px-4 mt-2 md:mt-0 py-2 rounded text-white items-center justify-center bg-gray-700 hover:bg-gray-500 transition">
                <span>Sign Up</span>
            </a>
            @else
            <a href="/" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded text-gray-400 items-center justify-center hover:text-gray-600 transition-all">
                <span>Home</span>
            </a>
            <div x-data="{ dropdownOpen: false }" class="relative ml-auto">
                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                    <div class="flex justify-between items-center">
                        <p class="bg-gray-500 text-white p-4 h-5 w-5 rounded-full flex justify-center items-center">{{ Auth()->user()->name[0] }} </p>
                        <i class="fas fa-caret-down ml-2"></i>
                    </div>
                </button>
                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                    <p class="block px-4 py-2 text-sm capitalize text-gray-700">
                        Hi, {{ Auth()->user()->name }}
                    </p>
                    <hr class="mb-1">
                    <a href="/profile" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                        <i class="fas fa-user mr-1"></i> My Profile
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm capitalize text-red-600 hover:bg-red-500 hover:text-white"><i class="fas fa-sign-out-alt mr-1"></i> Log Out</button>
                    </form>
                </div>
            </div>

            @endguest
        </div>
    </div>
</nav>
