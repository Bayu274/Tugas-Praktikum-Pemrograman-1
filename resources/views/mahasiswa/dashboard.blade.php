@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    {{-- Tim BE akan mengirim variabel $user yang berisi data mahasiswa yg login --}}
    <h3>Halo, {{-- $user->nama --}}!</h3>
    {{-- Tombol Logout [cite: 97] --}}
    <form action="{{-- route('logout') --}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Daftar Kegiatan</a>
            </li>
            <li class="nav-item">
                {{-- Link ke halaman riwayat pendaftaran --}}
                <a class="nav-link" href="{{-- route('mahasiswa.riwayat') --}}">Riwayat Pendaftaran</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h5 class="card-title">Kegiatan Tersedia</h5>
        <p class="card-text">Pilih kegiatan yang ingin kamu ikuti.</p>
        
        <div class="row mt-4">
            {{-- 
                Ini bagian perulangan (looping) data kegiatan.
                Tim BE akan mengirimkan variabel $kegiatan yang berisi daftar semua kegiatan.
            --}}
            {{-- @forelse($kegiatan as $item) --}}
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Poster Kegiatan">
                    <div class="card-body">
                        <h5 class="card-title">{{-- $item->nama_kegiatan --}}Webinar AI</h5>
                        <p class="card-text text-muted">{{-- $item->deskripsi --}}Deskripsi singkat mengenai webinar kecerdasan buatan.</p>
                        <p class="card-text">
                            <small class="text-muted">
                                Kuota: {{-- $item->kuota_tersisa --}} 45 / {{-- $item->total_kuota --}} 50
                            </small>
                        </p>

                        {{-- Mahasiswa memilih kegiatan, lalu ada konfirmasi (sesuai flowchart) [cite: 105, 106, 107] --}}
                        {{-- Logika cek kuota dan simpan data akan diurus oleh tim BE --}}
                        <form action="{{-- route('kegiatan.daftar', $item->id) --}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">Daftar Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- @empty --}}
            <div class="col-12">
                <div class="alert alert-info">
                    Saat ini belum ada kegiatan yang tersedia.
                </div>
            </div>
            {{-- @endforelse --}}

        </div>
    </div>
</div>
@endsection