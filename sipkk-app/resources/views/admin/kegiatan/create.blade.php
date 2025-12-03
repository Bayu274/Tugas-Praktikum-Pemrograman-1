<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-white leading-tight">
            <i class="fas fa-plus-circle mr-3"></i> {{ __('Tambah Kegiatan Baru') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8"> {{-- Ukuran card lebih kecil untuk form --}}
            {{-- Kontainer Form yang lebih modern (menggunakan dark theme) --}}
            <div class="bg-gray-900 dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-xl">
                <div class="p-4 sm:p-8 text-gray-100 dark:text-gray-200">
                    
                    <h3 class="text-xl font-semibold mb-6 border-b border-gray-700 pb-3">Informasi Detail Kegiatan</h3>

                    {{-- PERBAIKAN ROUTE PENTING DI SINI --}}
                    <form method="POST" action="{{ route('admin.kegiatan.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Nama Kegiatan -->
                        <div>
                            <x-input-label for="nama_kegiatan" :value="__('Nama Kegiatan')" />
                            <x-text-input id="nama_kegiatan" class="block mt-1 w-full border-gray-600 bg-gray-700 text-white" type="text" name="nama_kegiatan" :value="old('nama_kegiatan')" required autofocus autocomplete="nama_kegiatan" />
                            <x-input-error :messages="$errors->get('nama_kegiatan')" class="mt-2" />
                        </div>

                        <!-- Tanggal Mulai dan Selesai (Side-by-Side) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="tanggal_mulai" :value="__('Tanggal Mulai')" />
                                <x-text-input id="tanggal_mulai" class="block mt-1 w-full border-gray-600 bg-gray-700 text-white" type="date" name="tanggal_mulai" :value="old('tanggal_mulai')" required />
                                <x-input-error :messages="$errors->get('tanggal_mulai')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="tanggal_selesai" :value="__('Tanggal Selesai')" />
                                <x-text-input id="tanggal_selesai" class="block mt-1 w-full border-gray-600 bg-gray-700 text-white" type="date" name="tanggal_selesai" :value="old('tanggal_selesai')" required />
                                <x-input-error :messages="$errors->get('tanggal_selesai')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Lokasi dan Kuota (Side-by-Side) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="lokasi" :value="__('Lokasi')" />
                                <x-text-input id="lokasi" class="block mt-1 w-full border-gray-600 bg-gray-700 text-white" type="text" name="lokasi" :value="old('lokasi')" required autocomplete="lokasi" />
                                <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="kuota" :value="__('Kuota')" />
                                <x-text-input id="kuota" class="block mt-1 w-full border-gray-600 bg-gray-700 text-white" type="number" name="kuota" :value="old('kuota')" required min="1" />
                                <x-input-error :messages="$errors->get('kuota')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Kategori -->
                        <div>
                            <x-input-label for="kategori_id" :value="__('Kategori')" />
                            {{-- Menggunakan class standar Tailwind/Breeze yang disesuaikan untuk dark mode --}}
                            <select id="kategori_id" name="kategori_id" class="block mt-1 w-full border-gray-600 dark:border-gray-600 bg-gray-700 dark:bg-gray-700 text-white dark:text-gray-200 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="" class="text-gray-400">Pilih Kategori</option>
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                            {{-- Catatan: Pastikan Controller Anda mengirimkan variabel $kategori --}}
                            <x-input-error :messages="$errors->get('kategori_id')" class="mt-2" />
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <textarea id="deskripsi" name="deskripsi" rows="6" class="block mt-1 w-full border-gray-600 dark:border-gray-600 bg-gray-700 dark:bg-gray-700 text-white dark:text-gray-200 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <!-- Poster -->
                        <div>
                            <x-input-label for="poster" :value="__('Poster (Opsional)')" />
                            {{-- Penyesuaian style input type=file agar terlihat lebih baik di dark mode --}}
                            <input id="poster" type="file" name="poster" class="block mt-1 w-full text-sm text-gray-500 dark:text-gray-400
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-500 file:text-white
                                hover:file:bg-indigo-600" 
                            accept="image/*" />
                            <x-input-error :messages="$errors->get('poster')" class="mt-2" />
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center justify-end pt-4 border-t border-gray-700">
                            {{-- PERBAIKAN ROUTE INDEX --}}
                            <a href="{{ route('admin.kegiatan.index') }}" class="mr-6 px-4 py-2 text-gray-400 hover:text-gray-200 font-semibold transition duration-150">
                                <i class="fas fa-times-circle mr-1"></i> {{ __('Batal') }}
                            </a>
                            <x-primary-button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2">
                                <i class="fas fa-save mr-2"></i> {{ __('Simpan Kegiatan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>