<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    use HasFactory;

    protected $table = 'kategori_kegiatans'; // nama tabel di database

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    /**
     * Relasi ke model Kegiatan (One to Many)
     */
    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'kategori_id');
    }
}
