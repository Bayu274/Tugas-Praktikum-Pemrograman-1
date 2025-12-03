<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\KategoriKegiatan::create([
            'nama_kategori' => 'Seminar',
            'deskripsi' => 'Kegiatan seminar dan diskusi akademik',
        ]);

        \App\Models\KategoriKegiatan::create([
            'nama_kategori' => 'Workshop',
            'deskripsi' => 'Pelatihan dan workshop praktis',
        ]);

        \App\Models\KategoriKegiatan::create([
            'nama_kategori' => 'Kompetisi',
            'deskripsi' => 'Lomba dan kompetisi mahasiswa',
        ]);

        \App\Models\KategoriKegiatan::create([
            'nama_kategori' => 'Sosial',
            'deskripsi' => 'Kegiatan sosial dan kemasyarakatan',
        ]);
    }
}
