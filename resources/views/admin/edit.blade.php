@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 max-w-2xl">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Edit & Update Dampak</h2>
        <p class="text-gray-500 text-sm mb-6">Perbarui hasil nyata dari aksi lingkungan yang telah dilaksanakan.</p>

        <form action="{{ route('admin.campaign.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Kampanye</label>
                    <input type="text" name="title" value="{{ $campaign->title }}" class="w-full border rounded-lg p-2.5 bg-gray-50">
                </div>

                <div class="bg-green-50 p-4 rounded-xl border border-green-100">
                    <label class="block text-sm font-bold text-green-800 mb-1 text-center uppercase tracking-wider">Hasil Nyata (Dampak Aktual)</label>
                    <input type="number" name="actual_impact" value="{{ $campaign->actual_impact }}" 
                           class="w-full border-2 border-green-200 rounded-lg p-3 text-center text-2xl font-bold focus:border-green-500 outline-none" 
                           placeholder="0">
                    <p class="text-[10px] text-green-600 mt-2 text-center italic">*Isi angka ini untuk otomatis mengubah status menjadi COMPLETED</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center">
                        <p class="text-xs font-bold text-gray-400 mb-2 uppercase">Foto Sebelum</p>
                        <img src="{{ asset('storage/'.$campaign->image_before) }}" class="w-full h-32 object-cover rounded-lg mb-2 grayscale">
                    </div>
                    <div class="text-center">
                        <p class="text-xs font-bold text-green-600 mb-2 uppercase">Unggah Foto Sesudah</p>
                        <input type="file" name="image_after" class="text-xs">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-100">
                        Simpan Perubahan & Selesaikan
                    </button>
                    <a href="{{ route('admin.campaign.index') }}" class="block text-center mt-4 text-gray-500 text-sm font-medium">Kembali ke Daftar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection