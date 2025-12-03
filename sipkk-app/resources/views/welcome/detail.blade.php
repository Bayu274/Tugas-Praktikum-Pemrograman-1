@extends('template')
@section('judul')
    detail kegiatan
@endsection

@section('konten')
<div class="container mt-3">
    <div class="jumbotron">



    <!-- melakukan perulangan data dan merekam data nama kegiatan -->
    
        @foreach ($kegiatan as $keg)
            <h1> {{$keg-> nama}}</h1> <br>
        @endforeach

        <table id="detail" class="display" style="width:100%">
            <thead>
                <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
                $no = 1;    
            ?>
            @foreach ($detail as $det)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$det -> nim}}</td>
                <td>{{$det -> nama}}</td>
                <td>{{$det -> prodi}}</td>
            </tr>
            @endforeach
            </tbody>
            
            <tfoot>
                <tr>
                    <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                </tr>
            </tfoot>
                <script>
                    $(document).ready(function() 
                    {
                    $('#detail').DataTable();
                    } );
                </script>
        </table>
 <a href="/datakegiatan"><button type="button" class="btn btn-primary btn-sm">Kembali</button></a>
    </div>
</div>
@endsection




