<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Relawan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-2xs flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">Halo, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-sm text-gray-500 mt-1">Selamat datang kembali di pusat aksi penyelematan lingkungan GreenAction.</p>
                </div>
                <div class="flex gap-3">
                    <a href="/explore" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-4 rounded-xl text-sm transition shadow-2xs">
                        Ikuti Aksi Baru
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-2xs flex items-center">
                    <div class="p-3 bg-green-50 text-green-600 rounded-xl mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Relawan</p>
                        <h4 class="text-2xl font-black text-gray-900 mt-0.5">{{ $stats['total_users'] }} Pengguna</h4>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-2xs flex items-center">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Aksi Diikuti</p>
                        <h4 class="text-2xl font-black text-gray-900 mt-0.5">{{ $stats['my_actions'] }} Aktivitas</h4>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-2xs flex items-center">
                    <div class="p-3 bg-amber-50 text-amber-600 rounded-xl mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Kontribusi Dampak</p>
                        <h4 class="text-2xl font-black text-gray-900 mt-0.5">{{ $stats['total_impact'] }} Poin</h4>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-2xs overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900">Riwayat Aksi Lingkungan Anda</h3>
                    <span class="text-xs font-semibold text-green-700 bg-green-50 px-2.5 py-1 rounded-full">Data Terkini</span>
                </div>
                
                <div class="p-12 text-center">
                    <div class="w-16 h-16 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4 border border-dashed border-gray-200">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-bold text-gray-700">Anda belum mendaftar di kampanye mana pun.</p>
                    <p class="text-xs text-gray-400 mt-1 max-w-sm mx-auto">Mari buat perubahan positif pertama Anda hari ini dengan menjelajahi aksi penanaman pohon atau pembersihan sampah yang tersedia.</p>
                    <div class="mt-5">
                        <a href="/explore" class="inline-flex items-center text-xs font-bold text-green-600 hover:text-green-700">
                            Mulai Jelajahi Sekarang
                            <svg class="w-3.5 h-3.5 ms-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>