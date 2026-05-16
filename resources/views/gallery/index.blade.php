<x-guest-layout> 
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> 
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                <div>
                    <h2 class="font-bold text-3xl text-gray-800 tracking-tight">
                        Galeri Dampak Nyata
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">Bukti nyata kontribusi seluruh relawan GreenAction untuk bumi.</p>
                </div>
                
                @auth
                    <a href="{{ route('gallery.create') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-5 rounded-xl transition duration-200 shadow-xs text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Unggah Aksimu
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 font-medium py-2.5 px-5 rounded-xl transition duration-200 text-sm shadow-xs">
                        Login untuk Unggah Foto
                    </a>
                @endauth
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm font-medium shadow-xs">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                @forelse($galleries as $gallery)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xs border border-gray-100 group hover:shadow-md transition duration-300 flex flex-col justify-between">
                        <div>
                            <div class="relative aspect-video sm:aspect-square overflow-hidden bg-gray-200">
                                <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                                     alt="{{ $gallery->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                
                                <span class="absolute bottom-3 left-3 bg-black/50 text-white backdrop-blur-xs text-xs px-2.5 py-1 rounded-md font-medium">
                                    {{ $gallery->category }}
                                </span>
                            </div>

                            <div class="p-4 pb-1">
                                <h3 class="font-bold text-gray-800 line-clamp-1 group-hover:text-green-600 transition">
                                    {{ $gallery->title }}
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">
                                    {{ $gallery->description }}
                                </p>
                            </div>
                        </div>

                        <div class="p-4 pt-0">
                            <div class="mt-4 pt-3 border-t border-gray-50 flex justify-between items-center text-xs text-gray-400">
                                <span class="font-medium text-gray-600">Oleh: {{ $gallery->user->name }}</span>
                                <span>{{ $gallery->created_at->diffForHumans() }}</span>
                            </div>

                            @auth
                                @if($gallery->user_id === auth()->id())
                                    <div class="mt-3 pt-2 border-t border-dashed border-gray-100 flex items-center justify-end gap-2">
                                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="text-xs font-semibold text-gray-500 hover:text-green-600 bg-gray-50 hover:bg-green-50 px-3 py-1.5 rounded-lg transition">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('gallery.destroy', $gallery->id) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kenangan aksi lingkungan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-semibold text-red-500 hover:text-white bg-red-50 hover:bg-red-600 px-3 py-1.5 rounded-lg transition cursor-pointer">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-dashed border-gray-200 p-8">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">Belum ada foto dampak yang diunggah.</p>
                        <p class="text-gray-400 text-xs mt-1">Jadilah relawan pertama yang membagikan aksi nyata hari ini!</p>
                    </div>
                @endforelse

            </div>

            <div class="mt-8">
                {{ $galleries->links() }}
            </div>

        </div>
    </div>
</x-guest-layout>