<nav x-data="{ open: false }" class="bg-white shadow-xs sticky top-0 z-50 border-b border-gray-100">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        
        <a href="{{ Auth::check() ? route('dashboard') : url('/') }}" class="flex items-center space-x-2">
            <div class="bg-green-600 p-2 rounded-xl text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
            </div>
            <span class="text-xl font-bold tracking-tight text-gray-900">Green<span class="text-green-600">Action</span></span>
        </a>

        <div class="hidden md:flex items-center space-x-8 font-medium text-sm">
            @auth
                <a href="{{ route('dashboard') }}" 
                   class="transition {{ request()->routeIs('dashboard') ? 'text-green-600 font-bold' : 'text-gray-600 hover:text-green-600' }}">
                   Dashboard
                </a>
            @endauth
            
            <a href="/explore" 
               class="transition {{ request()->is('explore') || request()->is('explore/*') ? 'text-green-600 font-bold' : 'text-gray-600 hover:text-green-600' }}">
               Jelajah Aksi
            </a>
            
            <a href="/gallery" 
               class="transition {{ request()->is('gallery') || request()->is('gallery/*') ? 'text-green-600 font-bold' : 'text-gray-600 hover:text-green-600' }}">
               Galeri Dampak
            </a>
        </div>

        <div class="hidden md:flex items-center space-x-4">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-semibold rounded-xl text-gray-500 bg-gray-50 hover:text-gray-700 hover:bg-gray-100 focus:outline-hidden transition ease-in-out duration-150 cursor-pointer">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile Setting') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-red-600 hover:bg-red-50">
                                {{ __('Keluar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <a href="/login" class="text-gray-600 hover:text-green-600 font-semibold transition text-sm px-3 py-2">
                    Masuk
                </a>
                <a href="/register" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl font-semibold transition text-sm shadow-xs">
                    Daftar
                </a>
            @endauth
        </div>

        <div class="flex items-center md:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-hidden transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-t border-gray-100 shadow-inner">
        <div class="px-6 py-3 space-y-2">
            @auth
                <a href="{{ route('dashboard') }}" class="block py-2 text-sm font-semibold {{ request()->routeIs('dashboard') ? 'text-green-600' : 'text-gray-600' }}">Dashboard</a>
            @endauth
            
            <a href="/explore" class="block py-2 text-sm font-semibold {{ request()->is('explore') ? 'text-green-600' : 'text-gray-600' }}">Jelajah Aksi</a>
            <a href="/gallery" class="block py-2 text-sm font-semibold {{ request()->is('gallery') ? 'text-green-600' : 'text-gray-600' }}">Galeri Dampak</a>
            
            <div class="pt-4 border-t border-gray-100 space-y-2">
                @auth
                    <div class="pb-2">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Akun Relawan</p>
                        <p class="text-sm font-bold text-gray-800 mt-0.5">{{ Auth::user()->name }}</p>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="block text-sm font-semibold text-gray-600 py-1">Pengaturan Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block text-left w-full text-sm font-semibold text-red-600 py-1">Keluar</button>
                    </form>
                @else
                    <a href="/login" class="block text-center w-full bg-gray-100 text-gray-700 font-semibold py-2.5 rounded-xl text-sm transition">
                        Masuk
                    </a>
                    <a href="/register" class="block text-center w-full bg-green-600 text-white font-semibold py-2.5 rounded-xl text-sm shadow-xs transition">
                        Daftar Akun Baru
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>