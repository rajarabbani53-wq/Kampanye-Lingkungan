<x-guest-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('campaign.index') }}" class="text-sm text-green-600 hover:underline flex items-center gap-1 font-medium">
                    ← Kembali ke Daftar Campaign
                </a>
            </div>

            <div class="bg-white rounded-2xl overflow-hidden shadow-xs border border-gray-100">
                <div class="w-full h-96 bg-gray-200 overflow-hidden">
                    @if($campaign->image_path)
                        <img src="{{ asset('storage/' . $campaign->image_path) }}" alt="{{ $campaign->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">
                            <span>Tidak ada gambar pratinjau</span>
                        </div>
                    @endif
                </div>
                
                <div class="p-8">
                    <span class="bg-green-50 text-green-700 text-xs px-3 py-1 rounded-md font-semibold tracking-wide uppercase">
                        {{ $campaign->category }}
                    </span>
                    
                    <h1 class="font-bold text-3xl text-gray-800 mt-3 leading-tight">
                        {{ $campaign->title }}
                    </h1>
                    
                    <div class="mt-2 text-xs text-gray-400 flex items-center gap-1.5">
                        <span class="font-medium text-gray-600">Oleh: {{ $campaign->user->name ?? 'Relawan GreenAction' }}</span> 
                        <span>•</span>
                        <span>{{ $campaign->created_at?->diffForHumans() ?? 'Baru saja dirilis' }}</span>
                    </div>

                    <hr class="my-6 border-gray-100">

                    <p class="text-gray-600 leading-relaxed whitespace-pre-line text-sm">
                        {{ $campaign->description }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>