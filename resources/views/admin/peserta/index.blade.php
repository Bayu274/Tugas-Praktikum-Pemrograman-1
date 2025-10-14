@extends('layouts.app')

@section('title', 'Daftar Peserta')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    {{-- Tim BE akan mengirim variabel $kegiatan berisi info kegiatan yg pesertanya dilihat --}}
    <h3>Daftar Peserta: {{-- $kegiatan->nama_kegiatan --}}</h3>
    <div>
        <a href="{{-- route('admin.dashboard') --}}" class="btn btn-secondary">Kembali</a>
        {{-- Tombol untuk cetak laporan admin, sesuai flowchart --}}
        <a href="#" class="btn btn-success">Cetak Laporan</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
         <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Waktu Mendaftar</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Tim BE akan mengirim variabel $peserta --}}
                    {{-- @forelse($peserta as $p) --}}
                    <tr>
                        <th scope="row">1{{-- $loop->iteration --}}</th>
                        <td>M0522001{{-- $p->mahasiswa->nim --}}</td>
                        <td>Ahmad Budi{{-- $p->mahasiswa->nama --}}</td>
                        <td>Pendidikan Teknik Informatika dan Komputer{{-- $p->mahasiswa->prodi --}}</td>
                        <td>14 Oktober 2025 13:54{{-- $p->created_at --}}</td>
                    </tr>
                     <tr>
                        <th scope="row">2{{-- $loop->iteration --}}</th>
                        <td>M0522002{{-- $p->mahasiswa->nim --}}</td>
                        <td>Citra Lestari{{-- $p->mahasiswa->nama --}}</td>
                        <td>Pendidikan Teknik Informatika dan Komputer{{-- $p->mahasiswa->prodi --}}</td>
                        <td>14 Oktober 2025 13:55{{-- $p->created_at --}}</td>
                    </tr>
                    {{-- @empty --}}
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada peserta yang mendaftar.</td>
                    </tr>
                    {{-- @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection