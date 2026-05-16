<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery; // Pastikan kamu sudah membuat model Gallery nanti
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman utama galeri dampak untuk semua pengunjung (Publik).
     */
    public function index()
    {
        // Mengambil data galeri terbaru dari database, dibatasi misalnya 12 data per halaman
        // Jika belum membuat model & tabel, kamu bisa mengomentari baris di bawah ini dan gunakan data statis dahulu
        $galleries = Gallery::with('user')->latest()->paginate(12);

        return view('gallery.index', compact('galleries'));
    }

    /**
     * Menampilkan formulir unggah foto aksi (Hanya untuk user yang login).
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Memproses penyimpanan foto dan data galeri ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi inputan form dari user
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
    ]);

    // 2. Proses upload file gambar jika ada
    if ($request->hasFile('image')) {
        // Menyimpan file ke folder: storage/app/public/gallery
        $imagePath = $request->file('image')->store('gallery', 'public');
    }

   // 3. Simpan data teks beserta path gambar ke database
    Gallery::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'category' => $request->category,
        'description' => $request->description,
        'image_path' => $imagePath, // <-- Ubah 'image' menjadi 'image_path'
    ]);

    // 4. Redirect kembali dengan notifikasi sukses global
    return redirect()->route('gallery.index')->with('success', 'Aksi lingkunganmu berhasil diabadikan!');
    }

    // Pastikan kamu mengimpor facade Storage di bagian paling atas file controller jika belum ada:
// use Illuminate\Support\Facades\Storage;

/**
 * Menampilkan formulir edit aksi (Hanya pemilik).
 */
public function edit(Gallery $gallery)
{
    // Cek Keamanan: Pastikan yang mengakses adalah pemilik data asli
    if ($gallery->user_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki akses untuk mengubah aksi ini.');
    }

    return view('gallery.edit', compact('gallery'));
}

/**
 * Memproses pembaruan data dan foto ke database.
 */
public function update(Request $request, Gallery $gallery)
{
    // Cek Keamanan
    if ($gallery->user_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki akses untuk mengubah aksi ini.');
    }

    // 1. Validasi data masuk (Gambar bersifat opsional saat edit)
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    // 2. Siapkan data penampung pembaruan teks
    $data = [
        'title' => $request->title,
        'category' => $request->category,
        'description' => $request->description,
    ];

    // 3. Jika user mengunggah foto baru untuk mengganti foto lama
    if ($request->hasFile('image')) {
        // Hapus file foto lama dari folder storage agar menghemat ruang disk
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        // Simpan file foto baru
        $data['image_path'] = $request->file('image')->store('gallery', 'public');
    }

    // 4. Eksekusi pembaruan ke database
    $gallery->update($data);

    return redirect()->route('gallery.index')->with('success', 'Aksi lingkunganmu berhasil diperbarui!');
}

/**
 * Menghapus data dan berkas foto dari server.
 */
public function destroy(Gallery $gallery)
{
    // Cek Keamanan
    if ($gallery->user_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki akses untuk menghapus aksi ini.');
    }

    // 1. Hapus berkas fisik gambar dari server
    if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
        Storage::disk('public')->delete($gallery->image_path);
    }

    // 2. Hapus baris data dari tabel database
    $gallery->delete();

    return redirect()->route('gallery.index')->with('success', 'Aksi lingkungan berhasil dihapus.');
}
}