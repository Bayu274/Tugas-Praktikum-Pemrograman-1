<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\Pendaftaran; // Tambahkan import Model Pendaftaran
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan daftar semua kegiatan untuk admin (admin.kegiatan.index)
     */
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

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }
    public function dataPendaftar()
    {
        // Ambil semua data pendaftaran, muat relasi user dan kegiatan
        // Urutkan berdasarkan waktu pendaftaran terbaru
        $pendaftar = Pendaftaran::with(['user', 'kegiatan'])
                                ->latest()
                                ->get();

        // Mengembalikan view yang akan kita buat
        return view('admin.pendaftar.index', compact('pendaftar'));
    }
}