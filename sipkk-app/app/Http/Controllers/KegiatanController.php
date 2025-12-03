<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{


    
    public function index()
    {
        $kegiatan = Kegiatan::with('kategori')->latest()->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Menampilkan form untuk menambah kegiatan baru
     */
    public function create()
    {
        $kategori = KategoriKegiatan::all();
        return view('admin.kegiatan.create', compact('kategori'));
    }

    /**
     * Menyimpan data kegiatan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'required|integer|min:1',
            'kategori_id' => 'required|exists:kategori_kegiatans,id',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|max:2048',
        ]);

        // Upload poster jika ada
        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
    }

        Kegiatan::create($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit kegiatan
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kategori = KategoriKegiatan::all();
        return view('admin.kegiatan.edit', compact('kegiatan', 'kategori'));
    }

    /**
     * Update data kegiatan
     */
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'required|integer|min:1',
            'kategori_id' => 'required|exists:kategori_kegiatans,id',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|max:2048',
        ]);

        // Jika ada file poster baru, hapus yang lama
        if ($request->hasFile('poster')) {
            if ($kegiatan->poster) {
                Storage::disk('public')->delete($kegiatan->poster);
            }
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $kegiatan->update($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Hapus kegiatan
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        if ($kegiatan->poster) {
            Storage::disk('public')->delete($kegiatan->poster);
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
