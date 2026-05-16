@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Kampanye Lingkungan</h1>
        <a href="{{ route('admin.campaign.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold transition">
            + Tambah Kampanye
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Kampanye</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Lokasi</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Dampak (Target/Realita)</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($campaigns as $c)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-semibold text-gray-800">{{ $c->title }}</td>
                    <td class="px-6 py-4 text-gray-600 text-sm">{{ $c->location }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="text-green-600 font-bold">{{ $c->actual_impact ?? 0 }}</span> 
                        / <span class="text-gray-400">{{ $c->target_impact }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-bold {{ $c->status == 'upcoming' ? 'bg-blue-100 text-blue-600' : 'bg-green-100 text-green-600' }}">
                            {{ strtoupper($c->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-3">
                            <a href="{{ route('admin.campaign.edit', $c->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</a>
                            
                            <form action="{{ route('admin.campaign.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection