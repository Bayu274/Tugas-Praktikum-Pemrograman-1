<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($kegiatan as $item)
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow">
                                @if($item->poster)
                                    <img src="{{ asset('storage/' . $item->poster) }}" alt="{{ $item->nama_kegiatan }}" class="w-full h-48 object-cover rounded mb-4">
                                @endif
                                <h3 class="text-lg font-semibold mb-2">{{ $item->nama_kegiatan }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                    <strong>Kategori:</strong> {{ $item->kategori->nama_kategori }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                    <strong>Lokasi:</strong> {{ $item->lokasi }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                    <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                    <strong>Kuota:</strong> {{ $item->kuota }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                    <strong>Deskripsi:</strong> {{ Str::limit($item->deskripsi, 100) }}
                                </p>
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                                    Daftar
                                </button>
                            </div>
                        @empty
                            <p class="text-center col-span-full">Tidak ada kegiatan tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
