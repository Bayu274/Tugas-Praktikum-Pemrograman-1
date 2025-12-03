@extends('template')

@section('judul')
    Hasil
@endsection

@section('konten')
<div class="container mt-3">
    <div class="jumbotron">
    <h1 class="display-4">Hasil</h1>   
        <hr class="my-4">
    <form action="{{ url('/prosesform')}}" method="POST">
        {{csrf_field()}}
            <div class="form-group">
              <label for="exampleInputNama" >Nama Mahasiswa: </label>
                <h2>{{ $var_nama }}</h2>
            </div>
            <div class="form-group">
              <label for="exampleInputNilai">Program Studi: </label>
              <h2>{{ $var_prodi }}</h2>
            </div>
            <div class="form-group">
              <label for="exampleInputNilai">Nilai Mahasiswa: </label>
              <h2>{{ $var_nilai }}</h2>
            </div>
            <div class="form-group">
                    <label for="exampleInputNilai">Keputusan Akhir: </label>
                    <h2>{{ $var_status }}</h2>
                  </div>
          </form>
    </div>
</div>

@endsection