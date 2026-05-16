<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Abadikan Aksi Lingkunganmu') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-2xl shadow-xs border border-gray-100">
                
                <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    @if ($errors->any())
                        <div class="p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-600 shadow-2xs">
                            <div class="font-semibold mb-1">Gagal membagikan aksi. Silakan periksa kembali:</div>
                            <ul class="list-disc pl-5 space-y-0.5 text-xs text-red-500">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Judul Aksi</label>
                        <input type="text" name="title" value="{{ old('title') }}" required 
                            class="block mt-1 w-full p-2.5 rounded-lg border @error('title') border-red-400 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 @enderror text-sm">
                        @error('title')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Kategori Kegiatan</label>
                        <select name="category" required 
                            class="block mt-1 w-full p-2.5 rounded-lg border @error('category') border-red-400 @else border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 @enderror text-sm">
                            <option value="Aksi Bersih Sampah" {{ old('category') == 'Aksi Bersih Sampah' ? 'selected' : '' }}>Aksi Bersih Sampah</option>
                            <option value="Penanaman Pohon" {{ old('category') == 'Penanaman Pohon' ? 'selected' : '' }}>Penanaman Pohon & Mangrove</option>
                            <option value="Edukasi Lingkungan" {{ old('category') == 'Edukasi Lingkungan' ? 'selected' : '' }}>Edukasi Lingkungan</option>
                            <option value="Konservasi Air" {{ old('category') == 'Konservasi Air' ? 'selected' : '' }}>Konservasi Air</option>
                        </select>
                        @error('category')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Deskripsi / Dampak Nyata</label>
                        <textarea name="description" rows="3" required placeholder="Ceritakan dampak positif dari aksimu..." 
                            class="block mt-1 w-full p-2.5 rounded-lg border @error('description') border-red-400 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 @enderror text-sm">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Foto Bukti Aksi (Maks 2MB)</label>
                        <input type="file" name="image" accept="image/*" required 
                            class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                        @error('image')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <a href="{{ route('gallery.index') }}" class="px-4 py-2 text-sm text-gray-600 hover:underline">Batal</a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-5 rounded-lg transition text-sm shadow-xs">
                            Bagikan Foto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>