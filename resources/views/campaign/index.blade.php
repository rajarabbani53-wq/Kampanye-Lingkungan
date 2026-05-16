<x-guest-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-10 text-center md:text-left">
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                    Jelajah Aksi Lingkungan
                </h1>
                <p class="text-gray-500 mt-2 text-base max-w-2xl">
                    Pilih aksi nyata yang paling dekat denganmu. Bergabunglah bersama ratusan relawan lainnya untuk menjaga kelestarian bumi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($campaigns as $campaign)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xs border border-gray-100 flex flex-col group hover:shadow-md transition duration-300">
                        
                        <div class="relative aspect-video w-full overflow-hidden bg-gray-100">
                            @if($campaign->image_before)
                                <img src="{{ asset('storage/' . $campaign->image_before) }}" 
                                     alt="{{ $campaign->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-103 transition duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-green-50 text-green-600 font-bold text-sm">
                                    GreenAction Campaign
                                </div>
                            @endif
                            <span class="absolute top-3 right-3 bg-green-600 text-white text-xs px-2.5 py-1 rounded-full font-bold shadow-xs uppercase tracking-wider">
                                {{ $campaign->status }}
                            </span>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h2 class="text-xl font-bold text-gray-800 line-clamp-1 group-hover:text-green-600 transition duration-200">
                                {{ $campaign->title }}
                            </h2>
                            
                            <div class="mt-4 space-y-2 text-sm text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-green-600 mr-2 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="line-clamp-1">{{ $campaign->location }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-green-600 mr-2 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($campaign->date)->translatedFormat('d F Y') }}</span>
                                </div>
                            </div>

                            <div class="mt-5 pt-4 border-t border-gray-50">
                                <div class="flex justify-between items-center text-xs text-gray-400 font-medium mb-1">
                                    <span>Target Kontribusi</span>
                                    <span class="text-green-600 font-bold">{{ $campaign->target_impact }} Relawan</span>
                                </div>
                            </div>

                            <div class="mt-6">
                                <a href="{{ route('campaign.show', $campaign->id) }}" 
                                   class="block text-center w-full bg-green-50 hover:bg-green-100 text-green-700 font-bold py-2.5 px-4 rounded-xl transition duration-200 text-sm">
                                    Lihat Detail & Gabung Aksi
                                </a>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-dashed border-gray-200 p-8 shadow-xs">
                        <svg class="w-14 h-14 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <p class="text-gray-500 font-medium text-sm">Belum ada kampanye lingkungan aktif.</p>
                        <p class="text-gray-400 text-xs mt-1">Kembali lagi nanti atau hubungi admin untuk mendaftarkan aksi barumu!</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-guest-layout>