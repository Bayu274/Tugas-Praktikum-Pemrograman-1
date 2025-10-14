{{-- Menggunakan layout app.blade.php --}}
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md">
        
        {{-- Card container --}}
        <div class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold text-center text-slate-800 mb-2">
                Selamat Datang
            </h1>
            <p class="text-center text-slate-500 mb-6">Login untuk masuk ke SIPKK</p>
            
            {{-- Tanyakan nama rute 'login.auth' ke tim backend --}}
            <form action="{{-- route('login.auth') --}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-slate-700 text-sm font-bold mb-2" for="nim">
                        NIM / Username
                    </label>
                    <input class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="nim" name="nim" type="text" placeholder="Masukkan NIM atau username" required>
                </div>
                <div class="mb-6">
                    <label class="block text-slate-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-slate-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" name="password" type="password" placeholder="******************" required>
                </div>

                {{-- Menampilkan pesan error jika login gagal (dari tim BE) --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                        <strong class="font-bold">Gagal!</strong>
                        <span class="block sm:inline">NIM atau Password yang Anda masukkan salah.</span>
                    </div>
                @endif
                
                <div class="flex items-center justify-between">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
        <p class="text-center text-gray-500 text-xs">
            &copy;2025 PTIK UNS. All rights reserved.
        </p>
    </div>
</div>
@endsection