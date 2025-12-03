@extends('template')

@section('judul')
    Input Kegiatan
@endsection

@section('konten')
<div class="container mt-3">
    <div class="jumbotron">
    <h1 class="display-4">Tambah Kegiatan</h1>   
        <hr class="my-4">

	    @if (session('alert'))
          <div class="alert alert-success">
              {{ session('alert') }}
           </div>
        @endif 
        <form action="{{ url('/inputkegiatan')}}" method="POST" class="was-validated">
        {{csrf_field()}}
        
            <div class="form-group">
              <label for="exampleInputNama">Nama Kegiatan</label>
              <input type="text" class="form-control" id="exampleInputNama" name="nama" required>
              <div class="invalid-feedback"> Silahkan Masukkan Nama Kegiatan!</div>
            </div>

            <div class="form-group">
              <label for="exampleFormselecttanggal">Tanggal Kegiatan</label>
	      <!-- link datepicker -->
              <link rel="stylesheet" type="text/css" href="resources/css/bootsrap.css">
              <link rel="stylesheet" type="text/css" href="resources/css/datepicker.css">
              <script type="text/javascript" src="resources/js/main.js"></script>
              <script type="text/javascript" src="resources/js/bootstrap-datepicker.js"></script>
              <script type="text/javascript">
                  $(function(){
                    $('.datepicker').datepicker()
                  });
              </script>
	         <input type="date" class="form-control" id="exampleFormselecttanggal" name="tanggal" required>
              <div class="invalid-feedback">
                Mohon Masukkan Tanggal Kegiatan Dengan Benar!
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputKuota">Kuota Anggota Panitia Kegiatan</label>
              <input type="text" class="form-control" id="exampleInputKuota" name="kuota" required>
              	<div class="invalid-feedback"> Mohon Masukkan Kuota Anggota Panitia Kegiatan! </div>
            </div>

            <button type="submit" class="btn btn-primary">Proses</button>
          </form>
    </div>
</div>
@endsection


