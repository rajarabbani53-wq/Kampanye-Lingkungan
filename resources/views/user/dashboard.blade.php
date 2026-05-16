<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Dashboard Relawan</h1>
                <p class="text-gray-500 text-sm mt-1">Selamat datang kembali! Lihat kontribusi hijaumu di sini.</p>
            </div>
            <div class="flex gap-3">
                <a href="/explore" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl font-semibold transition duration-200 flex items-center shadow-xs text-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Cari Aksi Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="bg-white p-6 rounded-2xl shadow-xs border border-gray-100 group hover:shadow-md transition duration-200">
                    <div class="bg-green-100 w-12 h-12 rounded-xl flex items-center justify-center mb-4 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Aksi Diikuti</p>
                    <h3 class="text-3xl font-black text-gray-900 mt-1">08</h3>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-xs border border-gray-100 group hover:shadow-md transition duration-200">
                    <div class="bg-blue-100 w-12 h-12 rounded-xl flex items-center justify-center mb-4 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Sampah Terkumpul</p>
                    <h3 class="text-3xl font-black text-gray-900 mt-1">42 <span class="text-sm font-normal text-gray-400">Kg</span></h3>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-xs border border-gray-100 group hover:shadow-md transition duration-200">
                    <div class="bg-emerald-100 w-12 h-12 rounded-xl flex items-center justify-center mb-4 text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z"></path></svg>
                    </div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Pohon Ditanam</p>
                    <h3 class="text-3xl font-black text-gray-900 mt-1">15 <span class="text-sm font-normal text-gray-400">Bibit</span></h3>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-xs border border-gray-100 group hover:shadow-md transition duration-200">
                    <div class="bg-orange-100 w-12 h-12 rounded-xl flex items-center justify-center mb-4 text-orange-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Poin Green</p>
                    <h3 class="text-3xl font-black text-gray-900 mt-1">1.250</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xs border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                            <h2 class="text-xl font-bold text-gray-800">Riwayat Aksi</h2>
                            <span class="text-xs font-semibold bg-gray-100 px-3 py-1 rounded-full text-gray-500 italic">Data Terkini</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Kampanye</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Dampak</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 bg-white">
                                    @forelse($campaigns as $campaign)
                                    <tr class="hover:bg-gray-50/50 transition">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-lg object-cover shadow-2xs" src="{{ asset('storage/'.$campaign->image_before) }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-bold text-gray-900">{{ $campaign->title }}</div>
                                                    <div class="text-xs text-gray-400 mt-0.5">{{ $campaign->location }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($campaign->status == 'upcoming')
                                                <span class="px-2.5 py-1 text-xs font-bold bg-blue-50 text-blue-600 rounded-lg">Terdaftar</span>
                                            @else
                                                <span class="px-2.5 py-1 text-xs font-bold bg-green-50 text-green-600 rounded-lg">Selesai</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                                            {{ $campaign->actual_impact ?? '-' }} Kontribusi
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="/campaign/{{ $campaign->id }}" class="text-green-600 hover:text-green-800 font-bold text-sm transition">Detail</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-8 text-sm text-gray-400">Kamu belum mengikuti kampanye lingkungan apapun.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-green-600 rounded-2xl p-6 text-white shadow-xs">
                        <h3 class="text-lg font-bold mb-2">Tips Hari Ini 🌱</h3>
                        <p class="text-green-100 text-sm leading-relaxed mb-5">
                            Gunakan botol minum isi ulang saat mengikuti aksi besok. Satu langkah kecil darimu mengurangi satu sampah plastik di bumi!
                        </p>
                        <button class="w-full bg-white/15 hover:bg-white/25 text-white font-semibold py-2.5 rounded-xl transition text-sm backdrop-blur-xs">
                            Baca Panduan Relawan
                        </button>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-xs border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Update Komunitas</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-1.5 shrink-0"></div>
                                <p class="text-sm text-gray-600">Event <span class="font-bold text-gray-800">Bersih Pantai Ancol</span> diundur ke 20 Mei.</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-1.5 shrink-0"></div>
                                <p class="text-sm text-gray-600">Total penanaman pohon minggu ini mencapai <span class="font-bold text-gray-800">1.200 bibit!</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>