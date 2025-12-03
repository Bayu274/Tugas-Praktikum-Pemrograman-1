@extends('template')

@section('judul')
    Input Nilai
@endsection

@section('konten')
<div class="container mt-3">
    <div class="jumbotron">
    <h1 class="display-4">Input Nilai</h1>   
        <hr class="my-4">
    <form action="{{ url('/prosesform')}}" method="POST" class="needs-validation" novalidate>
        {{csrf_field()}}
            <div class="form-group">
              <label for="exampleInputNama">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="exampleInputNama" name="nama_mhs" required>
              <div class="invalid-feedback">
                    Masukkan nama dong!
                  </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Program Studi</label>
              <select class="form-control" id="exampleFormControlSelect1" name="prodi" required>
                <option selected disabled value="">Pilih...</option>
                <option>Pendidikan Teknik Informatika</option>
                <option>Manajemen Informatika</option>
                <option>Sistem Informasi</option>
                <option>Ilmu Komputer</option>
              </select>
              <div class="invalid-feedback">
                Dipilih Dong!
              </div>
            </div>
            
            <div class="form-group">
              <label for="exampleInputNilai">Nilai Mahasiswa</label>
              <input type="text" class="form-control" id="exampleInputNilai" name="nilai_mhs" required>
              <div class="invalid-feedback">
                    Nilainya oy!
                  </div>
            </div>
            <button type="submit" class="btn btn-primary">Proses</button>
          </form>
    </div>
</div>
@endsection

@section('javacode')
<script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>
@endsection