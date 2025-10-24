@extends('layouts.main')

@section('title', 'Detail Barang')

@section('content')
@section('header_title', 'Detail Barang')
@section('header_description', 'Info Lengkap Produk')

<div class="rounded-3xl shadow-xl overflow-hidden">

    @if ($barang)
        <!-- Header -->
        <div class="bg-terracotta text-white p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-1">{{ $barang->nama_barang }}</h2>
                    <p class="text-sm text-warm-beige/90">Detail lengkap informasi produk</p>
                </div>
                <div class="bg-warm-beige text-terracotta p-3 rounded-xl">
                    <i class="fas fa-box text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6 space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Kiri -->
                <div class="space-y-4">
                    <div class="rounded-xl p-4 border-l-4 border-sage-green bg-white shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-sage-green rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-tag text-white"></i>
                            </div>
                            <div>
                                <span class="text-gray-600 text-sm">Harga</span>
                                <h3 class="text-lg font-bold text-terracotta">
                                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl p-4 border-l-4 border-warm-brown bg-white shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-warm-brown rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-layer-group text-white"></i>
                            </div>
                            <div>
                                <span class="text-gray-600 text-sm">Kategori</span>
                                <h3 class="text-lg font-bold text-terracotta">{{ $barang->kategori->nama_kategori }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kanan -->
                <div class="space-y-4">
                    <div class="rounded-xl p-4 border-l-4 border-sage-green bg-white shadow-sm">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-sage-green rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-cubes text-white"></i>
                                </div>
                                <div>
                                    <span class="text-gray-600 text-sm">Stok Tersedia</span>
                                    <h3 class="text-xl font-bold text-terracotta">{{ $barang->stok }} Unit</h3>
                                </div>
                            </div>

                            @php
                                $stokClass = $barang->stok > 10 ? 'bg-sage-green text-white' : 'bg-red-500 text-white';
                                $stokText = $barang->stok > 10 ? 'Stok Aman' : 'Stok Rendah';
                                $stokIcon = $barang->stok > 10 ? 'fas fa-check-circle' : 'fas fa-exclamation-triangle';
                            @endphp
                            <div
                                class="{{ $stokClass }} px-3 py-2 rounded-lg text-xs font-semibold flex items-center space-x-1">
                                <i class="{{ $stokIcon }}"></i>
                                <span>{{ $stokText }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl p-4 border-l-4 border-terracotta bg-white shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-terracotta rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-truck text-white"></i>
                            </div>
                            <div>
                                <span class="text-gray-600 text-sm">Pemasok</span>
                                <h3 class="text-lg font-bold text-terracotta">{{ $barang->pemasok->nama_pemasok }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Status -->
            <div class="rounded-xl p-6 border border-warm-beige bg-white shadow-sm">
                <h3 class="text-xl font-bold text-terracotta mb-4 flex items-center">
                    <div class="w-8 h-8 bg-sage-green rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-chart-line text-white text-sm"></i>
                    </div>
                    Ringkasan Status
                </h3>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="rounded-lg p-4 text-center bg-cream">
                        <i
                            class="fas fa-check-circle text-2xl {{ $barang->stok > 0 ? 'text-sage-green' : 'text-red-500' }} mb-2"></i>
                        <span class="block text-gray-600 text-sm mb-1">Ketersediaan</span>
                        <span class="text-lg font-bold {{ $barang->stok > 0 ? 'text-sage-green' : 'text-red-500' }}">
                            {{ $barang->stok > 0 ? 'Tersedia' : 'Habis' }}
                        </span>
                    </div>

                    <div class="rounded-lg p-4 text-center bg-cream">
                        <i class="fas fa-calculator text-2xl text-terracotta mb-2"></i>
                        <span class="block text-gray-600 text-sm mb-1">Total Nilai</span>
                        <span class="text-lg font-bold text-terracotta">
                            Rp {{ number_format($barang->harga * $barang->stok, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="px-6 py-4 bg-warm-beige border-t border-cream">
            <div class="flex flex-col sm:flex-row justify-center gap-3">
                <a href="{{ route('barang.index') }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-warm-brown text-white font-medium rounded-lg hover:bg-terracotta transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>

                <a href="{{ route('barang.edit', $barang->id_barang) }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-sage-green text-white font-medium rounded-lg hover:bg-terracotta transition-all duration-300">
                    <i class="fas fa-edit mr-2"></i> Edit Barang
                </a>

                <button onclick="confirmDelete({{ $barang->id_barang }})"
                    class="inline-flex items-center justify-center px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition-all duration-300">
                    <i class="fas fa-trash mr-2"></i> Hapus Barang
                </button>
            </div>
        </div>
    @else
        <div class="p-8 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                <i class="fas fa-exclamation-triangle text-2xl text-red-500"></i>
            </div>
            <h3 class="text-xl font-bold text-terracotta mb-3">Barang Tidak Ditemukan</h3>
            <p class="text-gray-600 mb-6">Barang yang Anda cari tidak tersedia dalam sistem.</p>
            <a href="{{ route('barang.index') }}"
                class="inline-flex items-center px-4 py-2 bg-sage-green text-white font-medium rounded-lg hover:bg-terracotta transition-all duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>
    @endif
</div>

<!-- Delete Modal -->
<div id="deleteModal"
    class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50 transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-sm text-center">
        <h2 class="text-lg font-semibold mb-4 text-terracotta">Hapus Barang</h2>
        <p class="text-sm text-gray-600 mb-6">Apakah kamu yakin ingin menghapus barang ini? Tindakan ini tidak bisa
            dibatalkan.</p>
        <div class="flex justify-center gap-4">
            <button onclick="closeDeleteModal()"
                class="px-4 py-2 rounded-lg text-sm font-medium text-warm-brown bg-warm-beige hover:bg-cream transition">
                Batal
            </button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-4 py-2 rounded-lg text-sm font-semibold text-white bg-red-500 hover:bg-red-600 transition">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('body_scripts')
<script>
    function confirmDelete(id) {
        const form = document.getElementById('deleteForm');
        form.action = `/barang/${id}/destroy`;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }

    // Klik luar modal
    document.getElementById('deleteModal').addEventListener('click', e => {
        if (e.target === e.currentTarget) closeDeleteModal();
    });

    // Tekan ESC
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeDeleteModal();
    });
</script>
@endsection
