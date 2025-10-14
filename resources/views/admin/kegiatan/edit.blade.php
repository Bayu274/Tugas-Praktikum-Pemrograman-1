@extends('layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                {{-- Tim BE akan mengirim variabel $kegiatan berisi data yang akan di-edit --}}
                <h3>Edit Kegiatan: {{-- $kegiatan->nama_kegiatan --}}</h3>
            </div>
            <div class="card-body">
                {{-- Form akan dikirim ke rute 'admin.kegiatan.update' --}}
                <form action="{{-- route('admin.kegiatan.update', $kegiatan->id) --}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Method PUT untuk proses update --}}
                    
                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{-- $kegiatan->nama_kegiatan --}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{-- $kegiatan->deskripsi --}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{-- $kegiatan->tanggal --}}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="total_kuota" class="form-label">Total Kuota</label>
                            <input type="number" class="form-control" id="total_kuota" name="total_kuota" value="{{-- $kegiatan->total_kuota --}}" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="poster" class="form-label">Ganti Poster (Opsional)</label>
                        <input class="form-control" type="file" id="poster" name="poster">
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{-- route('admin.dashboard') --}}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Kegiatan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection