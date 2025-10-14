@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Manajemen Kegiatan</h3>
    <div>
        {{-- Tombol untuk menambah kegiatan baru [cite: 123] --}}
        <a href="{{-- route('admin.kegiatan.create') --}}" class="btn btn-primary">Tambah Kegiatan Baru</a>
        
        {{-- Tombol Logout Admin [cite: 117] --}}
        <form action="{{-- route('logout') --}}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Kuota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Tim BE akan mengirim variabel $kegiatan untuk ditampilkan di tabel --}}
                {{-- @forelse($kegiatan as $item) --}}
                <tr>
                    <td>{{-- $loop->iteration --}}1</td>
                    <td>{{-- $item->nama_kegiatan --}}Webinar AI</td>
                    <td>{{-- $item->tanggal --}}25 Okt 2025</td>
                    <td>{{-- $item->kuota_tersisa --}}45 / {{-- $item->total_kuota --}}50</td>
                    <td>
                        {{-- Aksi untuk melihat daftar peserta, edit, dan hapus [cite: 119, 122] --}}
                        <a href="{{-- route('admin.peserta.show', $item->id) --}}" class="btn btn-sm btn-info">Peserta</a>
                        <a href="{{-- route('admin.kegiatan.edit', $item->id) --}}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{-- route('admin.kegiatan.destroy', $item->id) --}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                 {{-- @empty --}}
                 <tr>
                    <td colspan="5" class="text-center">Belum ada data kegiatan.</td>
                 </tr>
                {{-- @endforelse --}}
            </tbody>
        </table>
    </div>
</div>
@endsection