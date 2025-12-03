{{-- resources/views/admin/kegiatan/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Kegiatan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Tambah Kegiatan Baru</h2>

        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" 
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200" required>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" 
                           class="w-full border-gray-300 rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" 
                           class="w-full border-gray-300 rounded-lg p-2" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}" 
                       class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Kuota Peserta</label>
                <input type="number" name="kuota" value="{{ old('kuota') }}" 
                       class="w-full border-gray-300 rounded-lg p-2" min="1" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Kategori Kegiatan</label>
                <select name="kategori_id" class="w-full border-gray-300 rounded-lg p-2" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4" 
                          class="w-full border-gray-300 rounded-lg p-2">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Upload Poster (Opsional)</label>
                <input type="file" name="poster" class="w-full border-gray-300 rounded-lg p-2">
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('kegiatan.index') }}" 
                   class="text-gray-600 hover:underline">← Kembali</a>

                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Simpan Kegiatan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
