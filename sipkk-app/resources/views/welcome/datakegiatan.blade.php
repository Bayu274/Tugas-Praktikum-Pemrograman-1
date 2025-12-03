@extends('template')

@section('judul')
    tabel data
@endsection

@section('konten')
<div class="container mt-3">

    <div class="jumbotron">
    <a href="/inputkegiatan"><button type="button" class="btn btn-primary btn-sm">Tambah Kegiatan</button></a><br><br>

        <!-- Sesion alert -->
        @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
        @endif 

        <table id="tabel-data" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Jumlah Pendaftar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;    
                ?>
            <!-- melakukan perulangan php dan untuk merekam data -->
                @foreach ($kegiatan as $keg)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$keg -> nama}}</td>
                    <td>{{$keg -> tanggal}}</td>
                    <td> {{$keg -> sisa}} dari {{$keg -> kuota}}</td>
                    <td>{{$keg -> status}}</td>
                    <td>
                    
                    <a href="/detail/{{$keg -> id}}"><button type="button" class="btn btn-warning btn-sm">Detail</button></a>
                    <a href="/deletedata/{{$keg -> id}}/"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
             
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Jumlah Pendaftar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
                <script>
                    $(document).ready(function() 
                    {
                    $('#tabel-data').DataTable();
                    } );
                </script>
        </table>
    </div>
</div>
@endsection