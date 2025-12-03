<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-white leading-tight">
            <i class="fas fa-history mr-3"></i> {{ __('Riwayat Pendaftaran Saya') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Kontainer Data --}}
            <div class="bg-gray-900 overflow-hidden shadow-2xl sm:rounded-xl">
                <div class="p-4 sm:p-8">
                    
                    <h3 class="text-xl font-semibold text-white mb-6 border-b border-gray-700 pb-3">Daftar Kegiatan yang Pernah Saya Ikuti</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th width="5%" class="px-6 py-3 text-left text-sm font-semibold text-gray-400 uppercase tracking-wider">No.</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400 uppercase tracking-wider">Kegiatan</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400 uppercase tracking-wider">Tanggal Daftar</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                                    <th width="15%" class="px-6 py-3 text-center text-sm font-semibold text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-900 divide-y divide-gray-800">
                                @forelse ($riwayatPendaftaran as $pendaftaran)
                                <tr class="hover:bg-gray-800 transition duration-150 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $loop->iteration }}</td>
                                    
                                    <td class="px-6 py-4 text-white font-medium">
                                        {{ $pendaftaran->kegiatan->nama_kegiatan ?? 'Kegiatan Tidak Ditemukan' }}
                                        <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($pendaftaran->kegiatan->tanggal_mulai)->translatedFormat('d F Y') }}</div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $pendaftaran->created_at->translatedFormat('d M Y, H:i') }}</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{-- Contoh Badge Status --}}
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($pendaftaran->status === 'Disetujui') bg-green-800 text-green-100
                                            @elseif($pendaftaran->status === 'Menunggu') bg-yellow-800 text-yellow-100
                                            @else bg-red-800 text-red-100
                                            @endif">
                                            {{ $pendaftaran->status }}
                                        </span>
                                    </td>
                                    
                                    {{-- Tombol Aksi --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2 justify-center">
                                        <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}" class="p-2 rounded-full text-indigo-400 hover:bg-indigo-900 transition duration-150 ease-in-out" title="Lihat Detail Bukti">
                                            <i class="fas fa-eye"></i> {{-- Lihat Bukti --}}
                                        </a>
                                        
                                        @if($pendaftaran->status === 'Menunggu')
                                        <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-full text-red-500 hover:bg-red-900 transition duration-150 ease-in-out" onclick="return confirm('Batalkan pendaftaran ini?')" title="Batalkan Pendaftaran">
                                                <i class="fas fa-undo"></i> {{-- Batalkan --}}
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 whitespace-nowrap text-center text-gray-500 italic">Anda belum memiliki riwayat pendaftaran kegiatan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>