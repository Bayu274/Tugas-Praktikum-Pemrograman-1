@extends('layouts.app')

@section('title', 'Riwayat Pendaftaran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Riwayat Pendaftaran Anda</h3>
    <a href="{{-- route('mahasiswa.dashboard') --}}" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>

<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{-- route('mahasiswa.dashboard') --}}">Daftar Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Riwayat Pendaftaran</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h5 class="card-title">Kegiatan yang Telah Anda Ikuti</h5>
        <p class="card-text">Berikut adalah daftar semua kegiatan yang telah berhasil Anda daftar.</p>
        
        <div class="table-responsive mt-4">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Tanggal Pelaksanaan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- 
                        Ini bagian perulangan (looping) data riwayat.
                        Tim BE akan mengirimkan variabel $riwayat.
                    --}}
                    {{-- @forelse($riwayat as $item) --}}
                    <tr>
                        <th scope="row">1{{-- $loop->iteration --}}</th>
                        <td>Webinar AI {{-- $item->kegiatan->nama_kegiatan --}}</td>
                        <td>25 Oktober 2025 {{-- $item->kegiatan->tanggal --}}</td>
                        <td><span class="badge bg-success">Pendaftaran Berhasil</span></td>
                        <td>
                             {{-- Tombol untuk mencetak bukti pendaftaran, sesuai flowchart --}}
                            <a href="#" class="btn btn-sm btn-primary">Cetak Bukti</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2{{-- $loop->iteration --}}</th>
                        <td>Lomba Desain Grafis {{-- $item->kegiatan->nama_kegiatan --}}</td>
                        <td>15 November 2025 {{-- $item->kegiatan->tanggal --}}</td>
                        <td><span class="badge bg-success">Pendaftaran Berhasil</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Cetak Bukti</a>
                        </td>
                    </tr>
                    {{-- @empty --}}
                    <tr>
                        <td colspan="5" class="text-center text-muted">Anda belum mendaftar kegiatan apapun.</td>
                    </tr>
                    {{-- @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection