<div class="md:flex flex-col md:flex-row md:min-h-screen">
    <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
            <div class="flex flex-col">
                <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Dashboard</a>
                <p class="text-sm text-gray-500">{{ date('d-M-Y') }}</p>
            </div>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
            <div x-data="{ open: false }">
                <a href="/admin/home" class="w-full flex justify-between items-center py-3 px-6 rounded-md text-gray-600 cursor-pointer hover:bg-gray-100 {{ (request()->is('admin/home*')) ? 'bg-gray-100' : '' }} hover:text-gray-700 focus:outline-none">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>

                        <span class="mx-4 font-medium">Dashboard</span>
                    </span>
                </a>

                <div x-show="open" class="bg-gray-100">
                    <a class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Accounts</a>
                    <a class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Tickets</a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 {{ (request()->is('admin/manage-users*')) ? 'bg-gray-100' : '' }} hover:text-gray-700 focus:outline-none">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>

                        <span class="mx-4 font-medium">Users</span>
                    </span>

                    <span>
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                            <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </button>

                <div x-show="open" class="bg-gray-50">
                    <a href="/admin/manage-users" class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Users</a>
                    <a class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Add New Admin</a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 {{ (request()->is('admin/manage-courses*')) ? 'bg-gray-100' : '' }} {{ (request()->is('admin/add-course*')) ? 'bg-gray-100' : '' }} focus:outline-none">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>

                        <span class="mx-4 font-medium">Courses</span>
                    </span>

                    <span>
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                            <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </button>

                <div x-show="open" class="bg-gray-50">
                    <a href="/admin/manage-courses" class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Courses</a>
                    <a href="/admin/add-course" class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Add New Course</a>
                    <a href="/admin/add-category" class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Add New Category</a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 {{ (request()->is('admin/manage-tutorials*')) ? 'bg-gray-100' : '' }} focus:outline-none">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>

                        <span class="mx-4 font-medium">Tutorials</span>
                    </span>

                    <span>
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                            <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </button>

                <div x-show="open" class="bg-gray-50">
                    <a href="/admin/manage-courses" class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Tutorials</a>
                    <a class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Add New Tutorials</a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 {{ (request()->is('admin/manage-comments*')) ? 'bg-gray-100' : '' }} focus:outline-none">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>

                        <span class="mx-4 font-medium">Comments</span>
                    </span>

                    <span>
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                            <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </button>

                <div x-show="open" class="bg-gray-50">
                    <a href="/admin/manage-comments" class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Manage Comments</a>
                    <!-- <a class="py-2 px-7 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="#">Add New Course</a> -->
                </div>
            </div>
            <div class="initial md:absolute bottom-0 my-4">
                @guest('admin')
                <a href="/register" class="lg:inline-flex text-center lg:w-auto w-full px-4 mt-2 md:mt-0 py-2 rounded text-white items-center justify-center bg-gray-700 hover:bg-gray-500 transition">
                    <span>Sign Up</span>
                </a>
                @else
                <div x-data="{ dropdownOpen: false }" class="relative ml-auto">
                    <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                        <div class="flex justify-between items-center">
                            <p class="bg-gray-500 text-white p-4 h-5 w-5 rounded-full flex justify-center items-center">{{ Auth()->user()->name[0] }} </p>
                            <p class="ml-2">{{ Auth()->user()->name }}</p>
                            <i class="fas fa-caret-down ml-2"></i>
                        </div>
                    </button>
                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                    <div x-show="dropdownOpen" class="absolute left-16 bottom-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
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
        </nav>
    </div>
</div>
