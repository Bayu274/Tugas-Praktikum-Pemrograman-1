<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans'; // nama tabel di database

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'kuota',
        'kategori_id',
        'deskripsi',
        'poster',
    ];

    /**
     * Relasi ke model KategoriKegiatan (Many to One)
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriKegiatan::class, 'kategori_id');
    }
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class,'id_kegiatan');
    }
}
