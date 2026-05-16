<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GreenAction') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-800">
        <div class="min-h-screen flex flex-col">
            
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white border-b border-gray-100 shadow-2xs">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-grow">
                @if (session('success') || session('error'))
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
                        @if (session('success'))
                            <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm font-medium flex justify-between items-center shadow-xs">
                                <span>{{ session('success') }}</span>
                                <button @click="show = false" class="text-green-500 hover:text-green-700 font-bold">&times;</button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm font-medium flex justify-between items-center shadow-xs">
                                <span>{{ session('error') }}</span>
                                <button @click="show = false" class="text-red-500 hover:text-red-700 font-bold">&times;</button>
                            </div>
                        @endif
                    </div>
                @endif

                {{ $slot }}
            </main>

            <footer class="bg-white border-t border-gray-100 py-4 text-center text-xs text-gray-400 font-medium">
                &copy; {{ date('Y') }} GreenAction. Semua Hak Dilindungi.
            </footer>
            
        </div>
    </body>
</html>