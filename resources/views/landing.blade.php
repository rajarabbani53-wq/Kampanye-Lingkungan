<x-guest-layout>
    
    <section class="relative bg-green-900 h-[600px] flex items-center">
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" 
                 class="w-full h-full object-cover opacity-40" alt="Nature Background">
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-2xl text-white">
                <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
                    Ubah Niat Jadi <span class="text-green-400">Aksi Nyata</span> untuk Bumi.
                </h1>
                <p class="text-xl mb-8 text-gray-200">
                    Gabung bersama ribuan relawan lainnya dalam aksi pembersihan sampah dan penanaman pohon di seluruh Indonesia.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/explore" class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-bold text-center transition shadow-lg">
                        Cari Aksi Terdekat
                    </a>
                    <a href="#impact" class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 px-8 py-4 rounded-full font-bold text-center transition">
                        Lihat Dampak Kita
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="impact" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <span class="text-4xl font-bold text-green-600 block">500+</span>
                    <span class="text-gray-500 uppercase tracking-widest text-xs font-semibold">Aksi Selesai</span>
                </div>
                <div>
                    <span class="text-4xl font-bold text-green-600 block">12k+</span>
                    <span class="text-gray-500 uppercase tracking-widest text-xs font-semibold">Relawan Aktif</span>
                </div>
                <div>
                    <span class="text-4xl font-bold text-green-600 block">25k</span>
                    <span class="text-gray-500 uppercase tracking-widest text-xs font-semibold">Pohon Ditanam</span>
                </div>
                <div>
                    <span class="text-4xl font-bold text-green-600 block">80 Ton</span>
                    <span class="text-gray-500 uppercase tracking-widest text-xs font-semibold">Sampah Terangkat</span>
                </div>
            </div>
        </div>
    </section>
    
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Kampanye Terbaru</h2>
                    <p class="text-gray-600">Ayo bergabung sebelum kuota relawan penuh!</p>
                </div>
                <a href="/explore" class="text-green-600 font-bold hover:underline hidden md:block">Lihat Semua →</a>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($campaigns->take(3) as $campaign)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                        <img src="{{ $campaign->image_before ? asset('storage/'.$campaign->image_before) : 'https://via.placeholder.com/400x250' }}" 
                             class="w-full h-48 object-cover" alt="Campaign">
                        <div class="p-6">
                            <span class="text-xs font-bold text-green-600 uppercase tracking-wider">{{ $campaign->location }}</span>
                            <h3 class="text-xl font-bold mt-2 mb-3">{{ $campaign->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $campaign->description }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-400 italic">{{ $campaign->date }}</span>
                                <a href="/campaign/{{ $campaign->id }}" class="text-green-600 font-bold text-sm">Ikuti Aksi →</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 italic col-span-3 text-center">Belum ada kampanye aktif saat ini.</p>
                @endforelse
            </div>
        </div>
    </section>
    
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="bg-green-600 rounded-3xl p-12 text-center text-white relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-green-500 rounded-full opacity-50"></div>
                
                <h2 class="text-3xl md:text-4xl font-bold mb-6 relative z-10">Miliki Komunitas Sendiri?</h2>
                <p class="text-xl text-green-100 mb-10 max-w-2xl mx-auto relative z-10">
                    Daftarkan organisasi atau komunitasmu sebagai mitra Green Action dan mulailah buat kampanye lingkunganmu sendiri.
                </p>
                <a href="/admin/campaign/create" class="inline-block bg-white text-green-600 px-10 py-4 rounded-full font-bold hover:bg-gray-100 transition relative z-10">
                    Buat Kampanye Sekarang
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>
