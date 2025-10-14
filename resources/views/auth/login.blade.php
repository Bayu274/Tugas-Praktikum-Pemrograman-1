{{-- Menggunakan kerangka dari app.blade.php --}}
@extends('layouts.app')

{{-- Mengisi bagian 'title' di kerangka --}}
@section('title', 'Login')

{{-- Mengisi bagian 'content' di kerangka --}}
@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Selamat Datang di SIPKK</h3>
                <p class="text-center text-muted">Silakan login untuk melanjutkan</p>
                
                {{-- 
                    PENTING: 'route('login.auth')' adalah nama rute yang akan dibuat oleh tim BE.
                    Tugasmu adalah menanyakan nama rute ini ke mereka.
                --}}
                <form action="{{-- route('login.auth') --}}" method="POST">
                    {{-- @csrf adalah token keamanan Laravel, wajib ada di setiap form --}}
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM / Username</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    {{-- Ini untuk menampilkan pesan error jika login gagal (sesuai flowchart) [cite: 91] --}}
                    {{-- Tim BE akan mengirimkan variabel $errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                           Email atau Password salah!
                        </div>
                    @endif

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection