<nav x-data="{ open: false }" class=" border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    {{-- <a href="{{ route('librarian.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a> --}}
                    <a href="{{route('user.')}}" class="sm:fixed sm:top-0 sm:left-0 p-6 text-left z-10 flex items-center space-x-2">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        {{-- <span class="font-semibold dark:text-black dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-xl">BRS</span> --}}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('librarian.home')" :active="request()->routeIs('librarian.home')">
                        Home
                    </x-nav-link>
                    <x-nav-link :href="route('librarian.borrows.index')" :active="request()->routeIs('librarian.borrows.index')">
                        Rental list
                    </x-nav-link>
                    <x-nav-link :href="route('librarian.books.create')" :active="request()->routeIs('librarian.books.create')">
                        Add new book
                    </x-nav-link>
                    <x-nav-link :href="route('librarian.genres.create')" :active="request()->routeIs('librarian.genres.create')">
                        Add new genre
                     </x-nav-link>
                    <x-nav-link :href="route('librarian.genres.index')" :active="request()->routeIs('librarian.genres.index')">
                        Genre list
                    </x-nav-link>
                    <x-nav-link :href="route('librarian.expired-genres.index')" :active="request()->routeIs('librarian.expired-genres.index')">
                        Archived Genre list
                    </x-nav-link>
                    <x-nav-link :href="route('librarian.expired-books.index')" :active="request()->routeIs('librarian.expired-books.index')">
                        Archived Books list
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-green-300 hover:text-black focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('librarian.profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('librarian.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('librarian.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('librarian.home')" :active="request()->routeIs('librarian.home')">
                Home
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('librarian.borrows.index')" :active="request()->routeIs('librarian.borrows.index')">
                Rental list
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('librarian.books.create')" :active="request()->routeIs('librarian.books.create')">
                Add new book
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('librarian.genres.create')" :active="request()->routeIs('librarian.genres.create')">
                Add new genre
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('librarian.genres.index')" :active="request()->routeIs('librarian.genres.index')">
                Genre list
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('librarian.expired-genres.index')" :active="request()->routeIs('librarian.expired-genres.index')">
                Archived genre list
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('librarian.expired-books.index')" :active="request()->routeIs('librarian.expired-books.index')">
                Archived book list
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options --> 
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('librarian.profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('librarian.logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('librarian.logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
