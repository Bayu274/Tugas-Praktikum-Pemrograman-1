@extends('template')

@section('judul')
    Daftar Kegiatan
@endsection

@section('konten')
<div class="container mt-3">
    <div class="jumbotron">
    <h1 class="display-4">Daftar Anggota Kegiatan</h1>   
    <hr class="my-4">
    <form action="{{ url('/pendaftaran')}}" method="POST" class="was-validated"> 
    {{csrf_field()}} 

  <!-- sesion alert  -->
    @if (session('alert'))
      <div class="alert alert-success">
        {{ session('alert') }} 
      </div>
    @endif
        
    <div class="form-group">
      <label for="exampleInputNama">NIM Mahasiswa</label>
      <input type="text" class="form-control" id="panitia" name="nim" required>
      <div class="invalid-feedback">
            Silahkan Masukkan NIM Mahasiswa!
          </div>
    </div>

    <div class="form-group">
      <label for="exampleInputNama">Nama Mahasiswa</label>
      <input type="text" class="form-control" id="panitia" name="nama" required>
      <div class="invalid-feedback">
            Silahkan Masukkan Nama Mahasiswa!
          </div>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Program Studi</label>
      <select class="form-control" id="panitia" name="prodi" required>
        <option selected disabled value="">Pilih...</option>
        <option>Pendidikan Teknik Informatika</option>
        <option>Manajemen Informatika</option>
        <option>Sistem Informasi</option>
        <option>Ilmu Komputer</option>
      </select>
      <div class="invalid-feedback">
        Silahkan Pilih Pgogram Studi!
      </div> 
    </div>
            
    <div class="form-group">
      <label for="panitia">Kegiatan</label>
      <select class="form-control" id="panitia" name="kegiatan_id" required>
      <option selected disabled value="">Pilih kepanitiaan </option>
        @foreach ($var_kegiatan as $kegiatan)

          @if ($kegiatan ->status == "tutup");
            @php 
              echo '<option value="'.$kegiatan->id.'" disabled >'.$kegiatan ->nama.'</option>';
            @endphp
          @else
            @php
            echo '<option value="'.$kegiatan->id.'">'.$kegiatan ->nama.'</option>';
            @endphp
          @endif
        @endforeach
      </select>
      <div class="invalid-feedback">
            Silahkan Pilih Kegiatan!
          </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm">Proses</button>
    <a href="/datakegiatan"><button type="button" class="btn btn-danger btn-sm">Cancel</button></a>
        </form>
    </div>
</div>
@endsection

