<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GreenAction') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50">
        <div class="min-h-screen flex flex-col">
            <header>
                <nav class="bg-white shadow-xs sticky top-0 z-50 border-b border-gray-100">
                    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                        
                        <a href="/" class="flex items-center space-x-2">
                            <div class="bg-green-600 p-2 rounded-xl text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </div>
                            <span class="text-xl font-bold tracking-tight">Green<span class="text-green-600">Action</span></span>
                        </a>

                        <div class="hidden md:flex items-center space-x-8 font-medium text-gray-600 text-sm">
                            <a href="/dashboard" class="hover:text-green-600 transition">Dashboard</a>
                            <a href="/explore" class="hover:text-green-600 transition">Jelajah Aksi</a>
                            <a href="/gallery" class="hover:text-green-600 transition">Galeri Dampak</a>
                        </div>

                        <div class="hidden md:flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl font-semibold transition text-sm shadow-xs">
                                    Dashboard
                                </a>
                                
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-gray-500 hover:text-red-600 font-semibold transition text-sm ml-2">
                                        Keluar
                                    </button>
                                </form>
                            @else
                                <a href="/login" class="text-gray-600 hover:text-green-600 font-semibold transition text-sm px-3 py-2">
                                    Masuk
                                </a>
                                <a href="/register" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl font-semibold transition text-sm shadow-xs">
                                    Daftar
                                </a>
                            @endauth
                        </div>

                    </div>
                </nav>
            </header>

            <main class="flex-row">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>