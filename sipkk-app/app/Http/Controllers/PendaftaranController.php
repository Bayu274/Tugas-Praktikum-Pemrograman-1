<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendaftaranRequest;
use App\Models\Kegiatan;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    
    public function create($id)
    {
        // Mencari data kegiatan berdasarkan ID
        $kegiatan = Kegiatan::find($id);
        
        // Cek jika kegiatan tidak ditemukan
        if (is_null($kegiatan)) {
            return redirect('dashboard')->with('error', 'Kegiatan tidak ditemukan atau sudah dihapus.');
        }
        
        // Hitung sisa kuota (jumlah pendaftar saat ini)
        $total_pendaftaran = Pendaftaran::where('id_kegiatan', $id)->count();
        $kuota = $kegiatan->kuota - $total_pendaftaran;

        return view('pendaftaran.create', compact(
            'kegiatan',
            'kuota'
        ));
    }

    /**
     * Menyimpan data pendaftaran baru.
     * Ini adalah method yang dipanggil oleh tombol 'Daftar' melalui POST request.
     */
    public function store(PendaftaranRequest $request)
    {
        $validasi = $request->validated();
        $userId = Auth::id();
        $idKegiatan = $validasi['id_kegiatan'];
    
        $data = [
                'id_user' => $userId, 
                'id_kegiatan' => $idKegiatan,
                'nim' => $validasi['nim'],
                'nama' => $validasi['nama'],
                'created_by' => $userId,
                'created_at' => Carbon::now()
        ];
            
            // 4. Simpan ke database
        $pendaftaran = Pendaftaran::create($data);
            
        return redirect()->route('pendaftaran.show', ['id' => $pendaftaran->id])->with('success', 'Pendaftaran Berhasil. Silakan cetak bukti pendaftaran.');
    }

    /**
     * Menampilkan bukti pendaftaran (detail pendaftaran).
     */
    public function show(int $id)
    {
        $pendaftaran = Pendaftaran::with('kegiatan')->findOrFail($id); 
        // Pastikan pengguna yang melihat adalah pemilik pendaftaran

        return view('pendaftaran.bukti', compact('pendaftaran')); 
    }
    
    /**
     * Menampilkan riwayat pendaftaran kegiatan milik pengguna yang sedang login.
     */
    public function index(): View|RedirectResponse 
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        try {
            // Ambil semua data pendaftaran (Riwayat) milik pengguna tersebut
            $riwayatPendaftaran = Pendaftaran::where('id_user', $userId) 
                                             ->with('kegiatan') 
                                             ->latest()
                                             ->get();

            // Mengembalikan view 'riwayat.index'
            return view('riwayat.index', compact('riwayatPendaftaran'));
            
        } catch (QueryException $e) {
            // Log error untuk membantu debugging
            Log::error('Error saat mengambil riwayat pendaftaran: ' . $e->getMessage(), [
                'user_id' => $userId,
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            // Tangani error, kemungkinan besar masalah relasi atau kolom di DB
            return redirect()->route('dashboard')->with('error', 'Gagal memuat riwayat pendaftaran. Cek definisi relasi kegiatan() di Model Pendaftaran Anda.');
        }
    }
}