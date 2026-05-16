@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 max-w-2xl">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Buat Kampanye Baru</h2>

        <form action="{{ route('admin.campaign.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Kampanye</label>
                    <input type="text" name="title" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-green-500 outline-none" required>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Lokasi</label>
                        <input type="text" name="location" class="w-full border rounded-lg p-2.5" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal</label>
                        <input type="date" name="date" class="w-full border rounded-lg p-2.5" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Target Dampak (Pohon/Kg Sampah)</label>
                    <input type="number" name="target_impact" class="w-full border rounded-lg p-2.5" placeholder="Contoh: 100" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Foto Lokasi (Sebelum Aksi)</label>
                    <input type="file" name="image_before" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition">
                        Publikasikan Kampanye
                    </button>
                    <a href="{{ route('admin.campaign.index') }}" class="block text-center mt-4 text-gray-500 text-sm">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection