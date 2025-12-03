@extends('dashboard')
@section('content')

<div class="card shadow mb-4">
     <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Daftar Kegiatan Kampus</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Kuota</th>
                            <th scope="col">#</th>        
                        </tr>
                    </thead>
                                            <tbody>
                                                @forelse ($kegiatan as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                                    <td>{{ $item->nama_kegiatan }}</td>
                                                    <td>{{ $item->lokasi }}</td>
                                                    <td>{{ $item->kuota }}</td>
                                                    <td><a class="btn btn-primary btn-sm" href="{{ route('pendaftaran-kegiatan.create') }}" role="button">Daftar</a></td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak Ada Data Kegiatan yang Tersedia</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                </table>
            </div>
        </div>                      
</div>
@endsection