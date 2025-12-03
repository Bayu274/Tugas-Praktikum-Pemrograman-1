<?php

namespace App\Http\Controllers\Auth; // Pastikan namespace ini benar jika file ada di folder 'Auth'

 // <-- FIX: Mengimpor Base Controller
use App\Http\Controllers\Controller; // Mengimpor Base Controller
use App\Models\Kegiatan; // Mengimpor Model Kegiatan
use Illuminate\Http\Request;
class UserKegiatanController extends \App\Http\Controllers\Controller // Error di sini (extends Controller) akan hilang
{
    /**
     * Menampilkan daftar kegiatan untuk Dashboard User.
     */
    public function index()
    {
        // Mengambil semua kegiatan, melakukan Eager Loading relasi 'pendaftaran' dan 'kategori'
        $kegiatan = Kegiatan::with(['pendaftaran', 'kategori'])->latest()->get(); 
        
        return view('dashboard', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}