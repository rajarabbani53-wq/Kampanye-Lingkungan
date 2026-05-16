<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
 * Menampilkan halaman landing dengan data kampanye terbaru
 */
    public function landing()
    {
    // Mengambil 3 kampanye terbaru untuk ditampilkan di landing page
    $campaigns = Campaign::latest()->take(3)->get();
    
    // Mengarahkan ke file resources/views/landing.blade.php
    return view('landing', compact('campaigns'));
    }
    /**
     * Menampilkan daftar kampanye untuk sisi Admin
     * (Sesuai dengan tampilan tabel di screenshot kamu)
     */
    public function adminIndex()
    {
        $campaigns = Campaign::latest()->get();
        return view('admin.index', compact('campaigns'));
    }

    /**
     * Menampilkan daftar kampanye untuk sisi Pengguna/Publik
     */
    public function index()
{
    // Mengambil data kampanye yang statusnya masih 'upcoming'
    $campaigns = Campaign::where('status', 'upcoming')->latest()->get();
    
    //  UBAH: Arahkan ke folder campaign file index, bukan user.dashboard
    return view('campaign.index', compact('campaigns'));
}

    /**
     * Menampilkan form untuk membuat kampanye baru
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Menyimpan kampanye baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'target_impact' => 'required|numeric',
            'image_before' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        // Handle upload foto "Before" jika ada
        if ($request->hasFile('image_before')) {
            $data['image_before'] = $request->file('image_before')->store('campaigns', 'public');
        }

        Campaign::create($data);

        return redirect()->route('admin.campaign.index')->with('success', 'Kampanye berhasil dibuat!');
    }

    /**
     * Menampilkan form edit (TUGAS PRAKTIKUM NO. 8)
     */
    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.edit', compact('campaign'));
    }

    /**
     * Memproses update data ke database (TUGAS PRAKTIKUM NO. 8)
     */
    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'actual_impact' => 'nullable|numeric',
            'image_after' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        // Handle upload foto "After" (Dampak nyata kampanye)
        if ($request->hasFile('image_after')) {
            // Hapus foto lama jika ingin menghemat storage
            if ($campaign->image_after) {
                Storage::delete('public/' . $campaign->image_after);
            }
            $data['image_after'] = $request->file('image_after')->store('campaigns', 'public');
        }

        // Jika dampak aktual diisi, otomatis ubah status jadi completed
        if ($request->actual_impact > 0) {
            $data['status'] = 'completed';
        }

        $campaign->update($data);

        return redirect()->route('admin.campaign.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Menghapus data kampanye
     */
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        
        // Hapus file foto dari storage sebelum hapus database
        if ($campaign->image_before) Storage::delete('public/' . $campaign->image_before);
        if ($campaign->image_after) Storage::delete('public/' . $campaign->image_after);

        $campaign->delete();

        return redirect()->route('admin.campaign.index')->with('success', 'Data berhasil dihapus');
    }
    /**
 * Menampilkan detail lengkap dari satu campaign tertentu.
 */
public function show(Campaign $campaign)
{
    // Membawa data campaign tunggal ke dalam view detail
    return view('campaign.show', compact('campaign'));
}
}